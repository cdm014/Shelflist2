<?php
  class View {
    public $raw;
    public $viewName;
    protected $viewData;
    protected $settings;
    function __construct($name,$settings) {
      $this->settings = $settings;
      $this->viewName = $name;
      $this->fileString = $this->settings['views'].$this->viewName.".tpl";
      $this->viewData = array();
      if (file_exists($this->fileString)) {
        $this->raw = file_get_contents($this->fileString);
        $this->temp = $this->raw;
      } else {
        throw new Exception("View ".$this->fileString." not found!" );
      }

    }

    function OutputInfo() {
      $html = "<h1>View Output</h1>";
      $html .= "<P>View name: ".$this->viewName."</p>";
      $html .= "<p>File Name: ".$this->fileString."</p>";
      $html .= "<P>Does Template exist: ".(file_exists($this->fileString)?"yes":"no")."</p>";
      $html .= "<p>Raw template</p>\r\n<pre>".htmlentities($this->raw)."</pre>\r\n";
      $html .= "<p>View Data</p><pre>".print_r($this->viewData,true)."</pre>";
      $html .= "\r\n<p>Settings</p><pre>".print_r($this->settings,true)."</pre>";
      return $html;
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
      $new = $this->raw;
      do {
        $init = $new;
        $new = $this->SinglePass($init);
      } while ($new != $init);
      return $new;
    }

}

