<?php
  require('../config/session.php');

  if(isset($_POST['submit'])){
    if(empty($_POST['email'])) {
      set_error_handler($error = 'Email or password missing');
    }elseif(empty($_POST['password'])){
      set_error_handler($error = 'Email or password missing');
    }else{
      createSession($_POST['email'], $_POST['password']);
    }
  }
?>
<?php include '../layout/headder.php' ?>
  <div class="content" style="justify-content: center;">
    <p style="color: red"><?php echo $error ?></p>
    <h1>Log in</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div>
        <input type="text" name="email" placeholder="Enter email">
      </div>
      <br>
      <div>
        <input type="password" name="password" placeholder="Enter password">
      </div>
      <br>
      <input type="submit" value="Submit"
      name="submit">
    </form>
  </div>
<?php include '../layout/footer.php' ?>