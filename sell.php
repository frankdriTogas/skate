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
    <div class="sell">
        <h1>Payment</h1>
        <div class="confirmSell">
            <div class="boxConfirm">
                <a href="http://localhost/Latihan2023/webBasicHtmlCssPhp/">Back</a>
                <?php
                include "admin/connectDb.php";
                include "admin/fungsi.php";
                $id = $_GET['id'];
                $qry = $conn->query("SELECT * FROM product WHERE id_product = $id");
                $d = $qry->fetch_array();
                ?>

                <div class="bxImg">
                    <img src="img/pic/<?= $d['image']; ?>" alt="">
                    <p>Nama Product : <?= $d['nama_product']; ?></p>
                    <p>Brand : <?= $d['brand_product']; ?></p>
                    <p>Jenis : <?= $d['jenis_product']; ?></p>
                    <p>Harga : Rp. <?= Rupiah($d['harga']); ?></p>
                    <p>Stock : <?= $d['stock']; ?></p>
                </div>
                <hr>
                <div class="bxPay">
                    <form action="sellProses.php" method="POST">
                        <div class="bx1">
                            <input type="hidden" name="stock" value="<?= $d['stock']; ?>">
                            <input type="hidden" name="id" value="<?= $d['id_product']; ?>">
                            <label for="">Jumlah Barang : </label><input type="number" name="jmlBarang">
                        </div>
                        <button type="submit">Confirm</button>
                        <button type="reset">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="_footer">
        <div class="btnUp">
            <a href="#home">up</a>
        </div>
        <p>Bakarrica | <b>2023</b></p>
    </div>
</body>

</html>