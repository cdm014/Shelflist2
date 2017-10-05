<?php
  
  $settings = array();
  $settings['controllers'] = "controllers/";
  $settings['views'] = "views/";
  $settings['models'] = "models/";
  require_once "config/sierra.inc.php";
  require_once $settings['views']."index.php";
  try {
    $dbh = new PDO('pgsql:host=sierra-db.rpl.org;port=1032;dbname=iii;sslmode=require',$settings['sierraname'],$settings['sierrapass']);
  }
  catch (PDOException $e) {
    print "Error!: ".$e->getMessage()."<br/>";
    die();
  }
  $sql = "Select B.id as ID, N.name from sierra_view.branch B join sierra_view.branch_name N on N.branch_id = B.id order by ID";
  $stmt = $dbh->query($sql);
  $op = json_encode($stmt->fetchAll());

  $testview = new View("page",$settings);
  $testview->OutputInfo();
?>
