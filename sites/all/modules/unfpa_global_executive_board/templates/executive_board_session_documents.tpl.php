<?php
/**
 * @file
 * Theme implementation to display session documents section for Exbo.
 */
?>
<div id='session-documents-wrapper'>
  <?php if ($no_data) : ?>
    <h2><?php print t("No result"); ?></h2>
  <?php else : ?>
    <h2><?php print t("UNFPA country programmes and related matters"); ?></h2>
  <?php endif; ?>
  <?php foreach ($exbo_document_data as $exbo_document_data_key => $document_data_val): ?>
    <?php foreach ($document_data_val as $document_data_key => $document_data): ?>

      <?php if (isset($session_title[$exbo_document_data_key][$document_data_key])) : ?>
        <h3><?php print $session_title[$exbo_document_data_key][$document_data_key]; ?></h3>
      <?php endif; ?>

      <div class="clearfix documents-wrapper">
        <?php foreach ($document_data as $country_code => $val): ?>

          <?php if (isset($document_data[$country_code]['programme_doc']['language']) || isset($document_data[$country_code]['board_doc'])) : ?>

            <div class="country-documents-wrapper">
              <?php if (isset($document_data[$country_code]['programme_doc']['language'])) : ?>

                <div class="programme-documents-wrapper">
                  <?php foreach ($document_data[$country_code]['programme_doc']['language'] as $key => $val): ?>
                    <?php $title_flag = ($key == 0) ? true : ($document_data[$country_code]['programme_doc']['title'][$key] != $document_data[$country_code]['programme_doc']['title'][$key - 1]); ?>
                    <?php if ((isset($document_data[$country_code]['programme_doc']['title'][$key])) && $title_flag): ?> 
                      <div class="document-title"><?php print ($document_data[$country_code]['programme_doc']['title'][$key]); ?></div>
                    <?php endif; ?>
                    <div class="document-language"><a href="<?php print $document_data[$country_code]['programme_doc']['pdf_file_link'][$key]; ?>" download><?php print ($document_data[$country_code]['programme_doc']['language'][$key]); ?></a></div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if (isset($document_data[$country_code]['board_doc'])) : ?>

                <div class="board-documents-wrapper">
                  <?php if (isset($document_data[$country_code]['programme_doc']['language'])): ?>
                    <h4><?php print t("Supporting Documents"); ?></h4>
                  <?php endif; ?>

                  <?php foreach ($document_data[$country_code]['board_doc']['doc_title'] as $doc_title_key => $doc_title_val): ?>

                    <?php if (isset($document_data[$country_code]['board_doc']['doc_title'][$doc_title_key])): ?>
                      <div class="document-title"><?php print ($document_data[$country_code]['board_doc']['doc_title'][$doc_title_key]); ?></div>
                    <?php endif; ?>
                    <?php foreach ($document_data[$country_code]['board_doc'][$doc_title_val]['language'] as $key => $val): ?>
                      <div class="document-language"><a href="<?php print $document_data[$country_code]['board_doc'][$doc_title_val]['pdf_file_link'][$key]; ?>" download><?php print ($document_data[$country_code]['board_doc'][$doc_title_val]['language'][$key]) . "<br>"; ?></a></div>
                      <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

              <?php endif; ?>
            </div>

          <?php endif; ?>
        <?php endforeach; ?>
      </div>

    <?php endforeach; ?>
  <?php endforeach; ?>
</div>

