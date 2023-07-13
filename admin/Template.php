<?php
function Theader($title = "")
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="mystyleAdmin.css">
        <title><?= isset($title) ? $title : ''; ?></title>
    </head>

    <body>
        <div class="container">
            <header>
                <div class="logo">
                    <img src="../img/logo.jpg" alt="">
                </div>
                <div class="user">
                    <ul>
                        <li><a href=""><?= $_SESSION['username']; ?></a></li>
                        <li>
                            <a href="">Settings</a>
                            <ul>
                                <li><a href="">Profile</a></li>
                                <li><a href="">Settings</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </header>
            <div class="isi">
                <nav>
                    <ul>
                        <li><a href="dash.php">Dashboard</a></li>
                        <li><a href="product.php">Product</a></li>
                        <li><a href="park.php">Park</a></li>
                        <li><a href="pesan.php">Message</a></li>
                        <li><a href="sales.php">Sales</a></li>
                        <li><a href="">Settings</a></li>
                        <li><a href="../index.php">Home</a></li>
                    </ul>
                </nav>
            <?php
        }

        function Tfooter()
        {


            ?>

            </div>
            <footer>Admin | SKATE | Bakarrica @ 2023</footer>
        </div>
    </body>

    </html>

<?php } ?>