<?php
  class View {
    protected $raw;
    public $viewName;
    protected $viewData;
    protected $settings;
    function __construct($name,$settings) {
      $this->settings = $settings;
      $this->viewName = $name;
      $this->fileString = $this->settings['views'].$this->viewName.".tpl";
      $this->viewData = array();

    }

    function OutputInfo() {
      $html = "<h1>View Output</h1>";
      $html .= "<P>View name: ".$this->viewName."</p>";
      $html .= "<p>File Name: ".$this->fileString."</p>";
      $html .= "<p>View Data</p><pre>".print_r($this->viewData,true)."</pre>";
      print $html;
    }

}

