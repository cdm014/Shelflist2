<?php
  class branchesModel {
      public $branches;
    function __construct() {
      global $dbh;
      $this->sql = "select B.id as ID, N.name from sierra_view.branch B join sierra_view.branch_name N on N.branch_id = B.id order by ID;";

      $this->stmt = $dbh->query($this->sql);
      if($this->stmt) {
        $this->branches = $this->stmt->fetchAll();
      } else {
        die("SQL: ".$this->sql." produced no results or an error");
      }
    }

  }
