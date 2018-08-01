<?php
  require('../config/database_queries.php');
  require('../config/session.php');
  validateSession();

  $id = $_GET['id'];
  $note = fetch("SELECT * FROM notes Where note_id=$id", 'one');

  if(isset($_POST['submit'])){
    if(empty($_POST['content']) && $_POST['content'] === ''){
      set_error_handler($error = 'fill in content');
    }else{
      fillNotes($_POST, 'update');
    }
  }
?>

<?php include '../layout/headder.php'; ?>

<div class="content">
  <p style="color: red;"><?php echo $error ?></p>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div>
      <input type="hidden" name="note_id" value="<?php echo $id; ?>">
    </div>
    <div>
      <label>Name:</label><br>
      <input type="text" name="name" value="<?php echo $note['name']; ?>">
    </div>
    <br>
    <div>
      <label>Content:</label><br>
      <textarea name="content" rows="20" cols='30'>
        <?php echo $note['content'] ?>
      </textarea>
    </div>

    <br>
    <input type="submit" value="Edit note"
  name="submit">
  </form>
</div>


<?php include '../layout/footer.php'; ?>

