<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>
<body>
    <?php
        if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] <= 1){
                header('Location: /index.php/');
            }
    ?>
    <div id="wrapper">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Add Vehicle</h1>
            <p>*Note all Fields are Required</p>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/vehicles/index.php" method="POST">
                <label>Classification</label>
                <br>
                <?php echo $carClassifications; ?>
                <br>
                <br>
                <label>Make</label>
                <br>
                <input type="text" name="make" id="make">
                <br>
                <br>
                <label>Model</label>
                <br>
                <input type="text" name="model" id="model">
                <br>
                <br>
                <label>Description</label>
                <br>
                <textarea name="description" rows="10" cols="30"></textarea>
                <br>
                <br>
                <label>Image Path</label>
                <br>
                <input type="text" name="image" id="image">
                <br>
                <br>
                <label>Thumbnail Path</label>
                <br>
                <input type="text" name="thumb" id="thumb">
                <br>
                <br>
                <label>Price</label>
                <br>
                <input type="number" name="price" id="price">
                <br>
                <br>
                <label># In Stock</label>
                <br>
                <input type="number" name="stock" id="stock">
                <br>
                <br>
                <label>Color</label>
                <br>
                <input type="text" name="color" id="color">
                <br>
                <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addVehicle">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
        </footer>
    </div>
</body>
</html>