<?php
  require('../config/session.php');
  require('../config/database_queries.php');
  validateSession();

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteFromDb($id, 'notes');
  }
?>

<h1>notes</h1>