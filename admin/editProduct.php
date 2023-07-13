<?php
include "connectDb.php";
include "Template.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Edit Product');

$id = $_GET['id'];
$qry = $conn->query("select * from product where id_product='" . $id . "'");
$data = $qry->fetch_array();


if (isset($_POST['edit'])) {
    $nama   = $_POST['nama'];
    $brand  = $_POST['brand'];
    $jenis  = $_POST['jenis'];
    $stock  = $_POST['stock'];
    $harga  = $_POST['harga'];

    if ($_FILES['img']['error'] === 4) {
        $namabaru  = $data['image'];
    } else {
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
        unlink('../img/pic/' . $data['image']);
    }

    $qry = $conn->query("update product set 
        nama_product='$nama',
        brand_product='$brand',
        jenis_product='$jenis',
        stock='$stock',
        harga='$harga',
        image='$namabaru' where id_product='$id'");

    if ($qry) {
        header("Location: product.php");
    } else {
        echo "ada yang salah";
    }
}
?>

<div class="content">
    <h1>Edit Product</h1>
    <div class="formTambah">
        <b><a href="product.php">
                < List Product</a></b>
        <form method="post" enctype="multipart/form-data">
            <div class="box">
                <label for="nama">Nama Product</label>
                <input type="text" name="nama" value="<?= $data['nama_product']; ?>">
            </div>
            <div class="box">
                <label for="brand">Brand Product</label>
                <input type="text" name="brand" value="<?= $data['brand_product']; ?>">
            </div>
            <div class="box">
                <label for="jenis">Jenis Product</label>
                <input type="text" name="jenis" value="<?= $data['jenis_product']; ?>">
            </div>
            <div class="box">
                <label for="stock">Stock</label>
                <input type="number" name="stock" value="<?= $data['stock']; ?>">
            </div>
            <div class="box">
                <label for="harga">Harga</label>
                <input type="number" name="harga" value="<?= $data['harga']; ?>">
            </div>
            <div class="box">
                <label for="image">Image</label>
                <img src="../img/pic/<?= $data['image']; ?>" alt="" width="100px">
                <input type="file" name="img" accept="image/JPEG">
            </div>
            <div class="boxBtn">
                <button type="submit" name="edit">Edit</button>
                <button type="reset">Batal</button>
            </div>
        </form>
    </div>
</div>

<?php Tfooter(); ?>