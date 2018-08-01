<?php
  # will fetch any querry from any table
  # requires a query and an amount specification og 'all or one'
  function fetch($query, $param){
    require('db.php');

    $result = mysqli_query($con, $query);

    if($param === 'all'){
      $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    if($param === 'one'){
      $data = mysqli_fetch_assoc($result);
    }

    mysqli_free_result($result);

    mysqli_close($con);

    return $data;
  }

  # will delete any note or user from the db
  # requires an id and a table name
  function deleteFromDb($id, $table){
    require('db.php');

    $query = "DELETE FROM $table WHERE note_id = {$id}";

    if(mysqli_query($con, $query)){
      header('location: main.php');
    }
  }

  # will update or create a note
  # requires a query and an amount specification og 'all or one'
  function fillNotes($post, $param){
    require('db.php');

    if($param === 'new'){$user_id = mysqli_real_escape_string($con, $post['user_id']);}

    if($param === 'update'){$note_id = mysqli_real_escape_string($con, $post['note_id']);}

    $name = mysqli_real_escape_string($con, $post['name']);

    $content = mysqli_real_escape_string($con, $post['content']);

    if($param === 'new'){ $query = "INSERT INTO notes(user_id, name, content) VALUES('$user_id', '$name', '$content')";}

    if($param == 'update'){$query = "UPDATE notes SET name='$name', content='$content' WHERE note_id={$note_id}";}

    if(mysqli_query($con, $query)){
      header('Location: main.php');
    }
  }

  # will create a new user
  # takes a query
  function newUser($post){
    require('db.php');
    if(filter_var($post['email'], FILTER_VALIDATE_EMAIL)){

      $email = mysqli_real_escape_string($con, $post['email']);

      $password = mysqli_real_escape_string($con, $post['password']);

      $query = "INSERT INTO users(email, password) VALUES('$email', '$password')";

      if(mysqli_query($con, $query)){
        header('Location: login.php');
      }
    }
  }

 ?>