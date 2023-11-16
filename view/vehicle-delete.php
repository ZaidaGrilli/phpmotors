<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] <= 1){
    header('Location: /index.php/');
}
?><!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
    <title>Content Title | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
    <div class = "page">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmototrs/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		        echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	            elseif(isset($invMake) && isset($invModel)) { 
		        echo "Delete $invMake $invModel"; }?></h1>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/vehicles/index.php" method="POST">
                <label>Make</label>
                <br>
                <input type="text" name="make" id="make" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> readonly>
                <br>
                <br>
                <label>Model</label>
                <br>
                <input type="text" name="model" id="model" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> readonly>
                <br>
                <br>
                <label>Description</label>
                <br>
                <textarea name="description" rows="10" cols="30" readonly><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea>
                <br>
                <br>
                <input type="submit" name="submit" value="Delete Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];}  ?>">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>
</html>