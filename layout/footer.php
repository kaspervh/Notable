
    <div class="navigation">
        <div class="navigationbox">
          <div class="imgbox">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
            <path d="M22 10l-6-6H4c-1.1 0-2 .9-2 2v12.01c0 1.1.9 1.99 2 1.99l16-.01c1.1 0 2-.89 2-1.99v-8zm-7-4.5l5.5 5.5H15V5.5z"/>
            <path fill="none" d="M0 0h24v24H0V0z"/>
            </svg>
          </div>
          <h3>Notable.com</h3>
        </div>
        <div class="linkbox">
          <?php
            if(!empty($_SESSION['user_id'])){
              echo '<a href="../pages/new_note.php" >New note</a>';
              echo '<a href="../pages/main.php">Main</a>';
              echo '<a href="../pages/logout.php">Logout</a>';
            }else{
              echo '<a href="../pages/index.php">Home</a>';
              echo '<a href="../pages/login.php">Login</a>';
              echo '<a href="../pages/signup.php"> Sign up</a>';
            }
          ?>
        </div>
    </div>
  </div>
</body>
</html>