<?php
#begins the session
 function createSession($email, $password){
  require('database_queries.php');

  $user = fetch("SELECT user_id FROM users WHERE email='$email' AND password='$password'", 'one');

  session_start();

  $_SESSION['user_id'] = $user['user_id'];

  header('location: main.php');
 }

# starts a session and validates if the user i loged in
 function validateSession (){
    session_start();
    if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){
      return header('location: index.php');
    }
  }


# deletes the current session
  function killSession() {
    session_start();
    session_destroy();
    header('location: login.php');
  }
?>
