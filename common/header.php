<!-- header.php -->
<header id="header">

    <img src="/phpmotors/images/site/logo.png" alt="Company Logo">
    <p><?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
            echo "<a href = '/phpmotors/accounts/index.php?action=Logout'>Log Out</a>";
        } else {
            echo "<a href = '/phpmotors/accounts/index.php?action=login'>My Account</a>";
        }
    ?>

</p><?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    echo "<a href = '/phpmotors/accounts/index.php' class = 'name-label'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a>";
} ?>
</header>
