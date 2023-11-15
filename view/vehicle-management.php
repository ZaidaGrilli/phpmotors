<?php 
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] <= 1){
    header('Location: /index.php/');
}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
    <?php 
        if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] <= 1){
            header('Location: /index.php/');
        }
?>
<body>
    <div class = "page" id="wrapper">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Vehicle Management</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <p><a href = "../vehicles/index.php/?action=classification">Add a car classification.</a></p>
            <p><a href = "../vehicles/index.php/?action=vehicle">Add a vehicle to inventory.</a></p>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>
</html>