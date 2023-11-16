<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login Page | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
<?php 
if (!$_SESSION['loggedin']){
    header('Location: /phpmotors/index.php/');
}
?>
<body>
<div id="wrapper">
    <header>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
    </header>
    <nav>
      <?php echo $navList; ?>
    </nav>
        <main>
            <h1><?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname']; ?></h1>
            
            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <p>You are logged in.</p>

            <ul>
                <li><?php echo "First Name: ".$_SESSION['clientData']['clientFirstname']; ?></li>
                <li><?php echo "Last Name: ".$_SESSION['clientData']['clientLastname'] ?></li>
                <li><?php echo "Email: ".$_SESSION['clientData']['clientEmail']; ?></li>
                <li><?php echo "Level: ".$_SESSION['clientData']['clientLevel']; ?></li>
            </ul>
            <h2>Account Management</h2>
            <p>Use this link to update account information</p>
            <p><a href = "/accounts/index.php/?action=updateInfo">Update Account Information</a></p>
            <?php
            if (intval($_SESSION['clientData']['clientLevel']) > 1){
                echo "<h2>Inventory Management</h2>";
                echo "<p>Use this link to manage the inventory</p>";
                echo "<a href = '/phpmotors/vehicles/'>Vehicle Management</a>";
            }
            ?>
        </main>
        <hr>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
    </div>
</body>
</html>