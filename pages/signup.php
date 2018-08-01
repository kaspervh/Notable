<?php
  require '../config/database_queries.php';

  if(isset($_POST['submit'])){
    if(empty($_POST['email'])) {
      set_error_handler($error = 'Email or password missing');
    }elseif(empty($_POST['password'])){
      set_error_handler($error = 'Email or password missing');
    }else{
      newUser($_POST);
    }
  }
?>
<?php include '../layout/headder.php' ?>
  <div class="content" style="justify-content: center;">
    <h1>Signup </h1>

    <p style="color: red;"><?php echo $error ?></p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      <div>
        <input type="text" name="email" placeholder="Enter email">
      </div>
      <br>
      <div>
        <input type="password" name="password" placeholder="Enter Password">
      </div>
      <br>
      <input type="submit" value="Submit"
      name="submit">
    </form>
  </div>
<?php include '../layout/footer.php' ?>