<?php
  $settings = array();
  $settings['controllers'] = "controllers/";
  $settings['views'] = "views/";
  $settings['models'] = "models/";

  require_once $settings['views']."index.php";

  $testview = new View("page",$settings);
  $testview->OutputInfo();
  $html1 = "<P> Can I find the file: ".(file_exists("views/page.tpl")?"Yes":"no")."</p>";
  //print $html1;
?>
