<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>SKATE</title>
</head>

<body>
    <div class="_header" id="home">
        <div class="logo">
            <img src="img/logo.jpg" alt="">
        </div>
        <div class="menu">
            <ul>
                <li><a href="http://localhost/Latihan2023/webBasicHtmlCssPhp/">Home</a></li>
                <li><a href="#product">Shop</a></li>
                <li><a href="#park">Park</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="_content">
        <section class="hero">
            <img src="img/hero.jpg" alt="">
            <div class="info">
                <p>Live on FOX SPORTS</p>
                <P><b>Friday, 20.07.2023</b></P>
                <p><b>18.30 PM</b></p>
            </div>
        </section>
        <section class="product" id="product">
            <?php include "_product.php" ?>
        </section>
        <section class="park" id="park">
            <?php include "_park.php" ?>
        </section>
        <section class="contact" id="contact">
            <?php include "_contact.php" ?>
        </section>
    </div>
    <div class="_footer">
        <p>Bakarrica | <b>2023</b></p>
    </div>
    <div class="btnUp">
        <a href="#home">up</a>
    </div>
</body>

</html>