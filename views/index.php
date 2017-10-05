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
    
    function setkey($key,$data) {
      $this->viewData[$key] = $data;
    }

    function SinglePass($input) {
      $output = $input;
      foreach ($this->viewData as $key => $val) {
        $token = "{".$key."}";
        $pattern = "/".$token."/";
        $output = preg_replace($pattern,$val,$output);
      }
      return $output;
    }

    function Parse() {
      $initString = $this->raw;
      $newstring = $this->raw;
      do {
        $initString = $newstring;
        $newString = $this->SinglePass($initString);
      } while ($initString != $newString);
      return $newString;
    }

}

