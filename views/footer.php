  </section>
  <footer>
    <?php if(check_login()): ?>
      <a href="./history.php">History</a> | <a href="./settings.php">Settings</a> | <a href="./session.php">Log Out</a>
    <?php endif ?>
  </footer>

  <script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
  <script type="text/javascript" src="./js/app.js"></script>
</body>