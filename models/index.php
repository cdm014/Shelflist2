<?php

  try {
$dbh = new PDO('pgsql:host=sierra-db.rpl.org;port=1032;dbname=iii;sslmode=require',$settings['sierraname'],$settings['sierrapass']);
}
catch (PDOException $e) {
print "Error!: ".$e->getMessage()."<br/>";
die();
}

