<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Sever Error | PHP Motors</title>
    <!-- device-width is the width of the screen in CSS pixels -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- screen is used for computer screens, tablets, smart-phones etc. -->
    <link href="..\css\style.css" type="text/css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div id="wrapper">
      <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "../phpmotors/common/header.php" ?>
      </header>
      <nav>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "../phpmotors/common/nav.php" ?>
      </nav>
      <main>
        <h1>Server Error</h1>
        <p> 
            Sorry our server seems to be experiencing some technical difficulties
        </p>

      </main>
      <hr>
      <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "../phpmotors/common/footer.php" ?>
      </footer>
    </div>
  </body>
</html>