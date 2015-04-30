<?php

$plugin = array(
  'single'          => TRUE,
  'title'           => t('jsLDA Output'),
  'description'     => t('Topic model output page.'),
  'category'        => t('SHANTI'),
  'render callback' => 'shanti_jslda_pane_render',
  'required context' => new ctools_context_required(t('Node'), 'node'),
);

function shanti_jslda_pane_render($subtype, $conf, $args, $context) {
  if (empty($context) || empty($context->data)) return FALSE;
  $tm_page = shanti_jslda_node($context->data->nid);
  $block = new stdClass();
  if (!$tm_page) $block->title = ''; 
  else $block->title = t('');
  $block->content = $tm_page;
  return $block;
}
