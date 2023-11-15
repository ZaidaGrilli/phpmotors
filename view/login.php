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
        <h1>Sign In</h1>
        <?php
        if (isset($message)) {
          echo $message;
        }
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
        }
      ?>
        <form class="user-form" method="POST" action="/phpmotors/accounts/">
            <label for="email">Email
                <input type="text" name="clientEmail" id="email" required>
            </label>
            <label for="password">Password
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span> 
              <input type="password" name="clientPassword" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            </label>
            <input type="hidden" name="action" value="Login">
            <button type="submit">Sign-In</button>
            <a href="../accounts?action=registration">Not a member yet?</a>
        </form>

    </main>
    <hr>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
</div>
</body>
</html>