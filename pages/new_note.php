<?php
  require '../config/database_queries.php';
  require '../config/session.php';
  validateSession();

  #check for submitt
  if(isset($_POST['submit'])){
    if(empty($_POST['content'])){
      set_error_handler($error = 'fill in content');
    }else{
      fillNotes($_POST, 'new');
    }
  }

?>

<?php include '../layout/headder.php'; ?>

  <div class="content">
    <p style="color: red;"><?php echo $error; ?></p>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

      <div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
      </div>

      <div>
        <label>Name:</label><br>
        <input type="text" name="name" placeholder="Enter Name">
      </div>
      <br>
      <div>
        <label>Content:</label><br>
        <textarea name="content" rows="20" cols='30' placeholder="Enter note content.."></textarea><br />
      </div>
      <br>
      <input type="submit" value="Add note"
  name="submit">
    </form>
  </div>
<?php include '../layout/footer.php'; ?>