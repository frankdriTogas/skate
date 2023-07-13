<?php
include "connectDb.php";
include "Template.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Tambah Product');

if (isset($_POST['submit'])) {
    $nama   = $_POST['nama'];
    $brand  = $_POST['brand'];
    $jenis  = $_POST['jenis'];
    $stock  = $_POST['stock'];
    $harga  = $_POST['harga'];

    // validasi gambar di upload
    $namafile = $_FILES['img']['name'];
    $ukuranfile = $_FILES['img']['size'];
    $error = $_FILES['img']['error'];
    $tmpname = $_FILES['img']['tmp_name'];

    // cek ukuran file 
    if ($ukuranfile > 3000000) {
        echo "<script>
                alert('Ukuran Gambar Terlalu!!');
                </script>";
        die;
    }

    // generate nama gambar
    $ekstensiFoto = explode('.', $namafile);
    $ekstensiFotook = strtolower(end($ekstensiFoto));
    $namabaru = 'pic-';
    $namabaru .= uniqid();
    $namabaru .= '.';
    $namabaru .= $ekstensiFotook;

    // move_uploaded_file($_FILES['img']['tmp_name'], "../img/" . $_FILES['img']['name']);
    move_uploaded_file($tmpname, '../img/pic/' . $namabaru);

    $qry = $conn->query("insert into product set 
        nama_product='$nama',
        brand_product='$brand',
        jenis_product='$jenis',
        stock='$stock',
        harga='$harga',
        image='$namabaru'");

    if ($qry) {
        header("Location: product.php");
    } else {
        echo "ada yang salah";
    }
}
?>

<div class="content">
    <h1>Tambah Product</h1>
    <div class="formTambah">
        <b><a href="product.php">
                < List Product</a></b>
        <form method="post" enctype="multipart/form-data">
            <div class="box">
                <label for="nama">Nama Product</label>
                <input type="text" name="nama" autofocus required>
            </div>
            <div class="box">
                <label for="brand">Brand Product</label>
                <input type="text" name="brand" required>
            </div>
            <div class="box">
                <label for="jenis">Jenis Product</label>
                <input type="text" name="jenis" required>
            </div>
            <div class="box">
                <label for="stock">Stock</label>
                <input type="number" name="stock" required>
            </div>
            <div class="box">
                <label for="harga">Harga</label>
                <input type="number" name="harga" required>
            </div>
            <div class="box">
                <label for="image">Image</label>
                <input type="file" name="img" accept="image/JPEG" required>
            </div>
            <div class="boxBtn">
                <button type="submit" name="submit">Tambah</button>
                <button type="reset">Batal</button>
            </div>
        </form>
    </div>
</div>

<?php Tfooter(); ?>