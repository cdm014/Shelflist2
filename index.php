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
    $locations = loadModel("locations");
   $testview->setKey('tpl-body',print_r($locations->locations,true));
  } 
  catch (Exception $e) {
    die($e->getMessage());
  }
  print $testview->Parse();
  
  
?>
