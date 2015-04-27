<?php

class shanti_jslda_handler_topic_model_document extends views_handler_field {

  public function render($values) {
    $value = $this->get_value($values);
    $value = strtolower($value);    
    $value = preg_replace("/<[^>]+>/"," ",$value);
    $value = preg_replace("/\n+/"," ",$value);
    $value = preg_replace("/\W+/"," ",$value);
    $value = preg_replace("/\d+/"," ",$value);
    $value = preg_replace("/\s+/"," ",$value);
    return $value;
  }

}
