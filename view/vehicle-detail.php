<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Vehicle Details | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
    <div id="wrapper">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?></h1>
            <?php if(isset($message)){
                    echo $message; }
            ?>
            <?php if(isset($vehicleHTML)){
                    echo $vehicleHTML; } 
            ?>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>
</html> 