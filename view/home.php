<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | PHP Motors</title>
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
    <!--Delorean showcase homepage-->
    <main>
        <h1>
            <bold>Welcome to PHP Motors!</bold>
        </h1>
        <div id="dl-Showcase">
            <div id="Own-today">
                <p>
                    <bold>DMC Delorean</bold>
                    <br>
                    3 Cup Holders<br>
                    Superman doors<br>
                    Fuzzy dic
                </p>
                <button class="large-screen">Own Today</button>
            </div>
            <img src="/phpmotors/images/delorean.jpg" alt="Delorean Showcase Picture">
            <button class="small-screen">Own Today</button>
        </div>
        <div class="info-layout">
            <div id="reviews">
                <h1>DMC Delorean Reviews</h1>
                <ul>
                    <li>"So fast its almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futuristir ride of our day</li>
                    <li>"88's livin and I love it!" (5/5)</li>

                </ul>
            </div>
            <div id="upgrades">
                <h1>Delorean Upgrades</h1>
                <div class="upgrades"><img src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux capacitor"><a
                            href="#">Flux
                        Capacitor</a></div>
                <div class="upgrades"><img src="/phpmotors/images/upgrades/flame.jpg" alt="flame decal"><a href="#">Flame
                        Decal</a></div>
                <div class="upgrades"><img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper stickers"><a
                            href="#">Bumper Stickers</a></div>
                <div class="upgrades"><img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub caps"><a href="#">Hub
                        Caps</a>
                </div>

            </div>
        </div>
    </main>
    <!--Don't go below this, dont touch the common links-->
    <hr>
    <footer>
      <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
    </footer>
</div>
</body>
</html>