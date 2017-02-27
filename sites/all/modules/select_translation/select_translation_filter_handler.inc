<?php
class select_translation_filter_handler extends views_handler_filter {
  // Don't display empty space where the operator would be.
  var $no_operator = TRUE;
  
  function option_definition() {
    $options = parent::option_definition();

    $options['value']['default'] = 'default';

    return $options;
  }

  function operator_form(&$form, &$form_state) {
    $form['operator'] = array();
  }
  
  function value_form(&$form, &$form_state) {
    $form['value'] = array(
      '#type' => 'radios',
      '#title' => t('Select translation selection mode'),
      '#options' => array(
        'original' => t('Use current language ; if not available use original language'),
        'default'  => t('Use current language ; if not available use default language ; if not available use original language'),
        'list'     => t('Choose language priorities below:'),
       ),
      '#default_value' => $this->value,
    );
    $form['priorities'] = array(
      '#type' => 'textfield',
      '#title' => t('Language priorities'),
      '#description' => t('If selection mode is set to "Choose language priorities", 
                           you can enter here a comma separated list of language codes. 
                           The filter will then return the node in the first available langauge
                           in that list ; and the original version if no match were found.<br/><br/>
                           The special value "current" will be replaced with the current language,
                           "default" will be replaced witht the default language, 
                           and "original" with the original language of each node.
                           <br/><br/>
                           Example:<br/><em>en,fr,current,default,original</em><br/>
                           This will return the version in english if available, if not in french,
                           if not in the current language, if not in the default language.
                           If none are available it will return the original version.'),
      '#default_value' => !empty($this->options['priorities']) ? $this->options['priorities'] : '',
    );
  }

  function query() {
    // Prepare input
    $list = array();
    if ($this->value == 'original') {
      $list = array('current');
    } 
    elseif ($this->value == 'default') {
      $list = array('current', 'default');
    } 
    elseif (!empty($this->options['priorities'])) {
      $list = explode(',', $this->options['priorities']);
      foreach ($list as $i => $v) {
        $list[$i] = strtolower(trim($v));
      }
    }
    $list[] = 'original';
    foreach ($list as $i => $v) {
      if ($list[$i] == 'current') {
        $list[$i] = '***CURRENT_LANGUAGE***';
      } 
      elseif ($list[$i] == 'default') {
        $list[$i] = language_default('language');
      }
    }
    $list = array_unique($list);
    
    // Now build the query. For every option, we need to exclude
    // the previous ones to ensure only one node gets selected in the end.
    $alias = $this->query->ensure_table('node');
    $query = "node.tnid = 0";
    $exclude = array();
    foreach ($list as $i => $v) {
      if ($v == 'original') {
        $add = "$alias.nid = $alias.tnid";
        $exc = "lmfh_node.tnid = lmfh_node.nid";
      } 
      else {
        $add = "$alias.language = '$v'";
        $exc = "lmfh_node.language = '$v'";
      }
      
      if (count($exclude)) {
        $add = $add . " AND
          0 = (SELECT count(lmfh_node.nid)
                 FROM {node} AS lmfh_node
                WHERE lmfh_node.tnid = node.tnid AND
                      ((".implode(') OR (', $exclude).")))";
      }
      $exclude[] = $exc;
        
      $query = $query . "\n OR ($add)";
    }
    
    $this->query->add_where_expression($this->options['group'], $query);
  }
}

