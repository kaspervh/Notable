<?php
  require('../config/database_queries.php');
  require('../config/session.php');
  validateSession();
  $current_user = $_SESSION['user_id'];

  $notes = fetch("SELECT name, content, note_id FROM notes Where user_id={$current_user}", 'all');

?>
<?php include '../layout/headder.php' ?>
<div class="content">
  <?php if(count($notes) === 0){ echo 'You do not have any notes for now. Click "New note" to create one'; } ?>

  <?php foreach ($notes as $note) : ?>
    <div class="notebox">
      <div class="headderbox">
        <h3><?php echo $note['name'] ?></h3>
      </div>
      <div class="contentbox">
        <p><?php echo $note['content']
        ?></p>
      </div>


      <div class="optionsbox">

        <div class="delete">
          <a href="delete_note.php?id=<?php echo $note['note_id']; ?>">Delete note</a>
        </div>

        <div class="update">
          <a href="edit_note.php?id=<?php echo $note['note_id']; ?>">Edit Note</a>
        </div>
      </div>
    </div>
    <br>

  <?php endforeach; ?>
</div>
<?php include '../layout/footer.php' ?>