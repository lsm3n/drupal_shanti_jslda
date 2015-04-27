<?php

/**
 * Implements hook_views_data().
 */
function shanti_jslda_views_data_alter(&$data) {

  $data['field_data_field_book_content']['field_book_content_topic'] = array(
    'title' => t('Texts Content as Topic Model Document'),
    'group' => t('Book'),
    'help' => t('Content formatted for use as a topic model document'),
    'real field' => 'field_book_content_value',
    'field' => array(
      'handler' => 'shanti_jslda_handler_topic_model_document',
      'type' => 'text',
    ),
  );

  $data['field_data_body']['body_topic'] = array(
    'title' => t('Body as Topic Model Document'),
    'group' => t('Content'),
    'help' => t('Content formatted for use as a topic model document'),
    'real field' => 'body_value',
    'field' => array(
      'handler' => 'shanti_jslda_handler_topic_model_document',
      'type' => 'text',
    ),
  );
  
}