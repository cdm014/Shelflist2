<?php
    $settings = array();
  $settings['controllers'] = "controllers/";
  $settings['views'] = "views/";
  $settings['models'] = "models/";
  require_once "config/sierra.inc.php";
 require_once "utilities.php"; //load common functions such as universal get  
  
  require_once $settings['models']."index.php";
  require_once $settings['views']."index.php";
  $testview = new View("page",$settings);
  try {
    $branches = loadModel("branches");
   $testview->setKey('tpl-body',print_r($branches->branches,true));
  } 
  catch (Exception $e) {
    die($e->getMessage());
  }
  print $testview->Parse();
  
  
?>
