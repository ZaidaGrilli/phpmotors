<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
      </header>
      <nav>
        <?php echo $navList; ?>
      </nav>
      <main>
      <h1>Register</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
      ?>
      <form class="user-form" method="POST" action="./">
        <label for="clientFirstname">First name
          <input type="text" name="clientFirstname" id="clientFirstname" required>
        </label>
        <label for="clientLastname">Last Name
          <input type="text" name="clientLastname" id="clientLastname" required>
        </label>
        <label for="clientEmail">E-mail
          <input type="email" name="clientEmail" id="clientEmail" value=required placeholder="Enter a valid email address">
        </label>
          <label for="clientPassword">Password:</label> 
          <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
          <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
          <input type="hidden" name="action" value="register">
          <button type="button" class="btn show-password">Show Password</button>
        
        <button type="submit">Register</button>
      </form>
      </main>
      <hr>
      <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
      </footer>
    </div>
  </body>
</html>