<?php
  require_once "config/sierra.inc";
  $settings = array();
  $settings['controllers'] = "controllers/";
  $settings['views'] = "views/";
  $settings['models'] = "models/";

  require_once $settings['views']."index.php";

  $testview = new View("page",$settings);
  $testview->OutputInfo();
?>
