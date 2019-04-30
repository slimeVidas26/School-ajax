<?php

abstract class View {

  protected $title = "School";
  protected $css = ['bootstrap.min.css','style.css' ];
  protected $js = ['jquery.min.js','bootstrap.min.js'];
  


  function __construct($title=NULL) {
    if($title) {
      $this->title = $title;
    }
  }

  function addJs($fileName) {
    $this->js[] = $fileName;
  }

  function addCss($fileName) {
    $this->css[] = $fileName;
  }

  abstract function dump();

}
