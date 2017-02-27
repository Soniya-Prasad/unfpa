<?php
/**
  * Implements hook_views_data().
  */

function custom_subscription_views_data() {
 $table = array(
    'tbl_subscription' => array(  // Mydons Custom table
       'table' => array(
          'group' => 'MySubscription',      // Groupname Mydons
             'base' => array(
               'field' => 'id',  //Primary key
               'title' => 'Subscription Customtable',
               'help' => 'Subscription Custom Database table'
            )
        ),
     //Description of id
        'id' => array(  
           'title' => t('Subscription Id'),
           'help' => t('Subscription Custom table Id field'),
           // is id field sortable TRUE
           'field' => array(
              'click sortable' => TRUE,  
            ),
      //Filter handler for filtering records by id     
           'filter' => array(
               'handler' => 'views_handler_filter_numeric'   
            ),  

           'sort' => array(
              'handler' => 'views_handler_sort'       
           )
         ),
     //Description of mail field
        'mail' => array(      
           'title' => t('Subscription User Email-id'),
           'help' => t('Subscription Custom table Mail field'),
           'field' => array(
              'click sortable' => TRUE,
           ),
           'filter' => array(
              'handler' => 'views_handler_filter_string'
           ),

           'sort' => array(
              'handler' => 'views_handler_sort'
           )
        ),
     //Description of created field
       'created' => array(           
           'title' => t('Subscription Created Timestamp'),
           'help' => t('Subscription Custom table Created field'),
           'field' => array(
                'click sortable' => TRUE,
				'handler' => 'views_handler_field_date',
             ),
           'filter' => array(
                 'handler' => 'views_handler_filter_date'
             ),
          'sort' => array(
             'handler' => 'views_handler_sort_date'
          )
        )
      )
    );
    return $table;
}