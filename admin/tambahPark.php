<?php
include "connectDb.php";
include "Template.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Tambah Skate Park');

if (isset($_POST['submit'])) {
    $nama   = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $lokasi  = $_POST['lokasi'];
    $ket  = $_POST['ket'];

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

    $qry = $conn->query("insert into park set 
        nama_park='$nama',
        alamat='$alamat',
        lokasi='$lokasi',
        image='$namabaru',
        keterangan='$ket'") or die(mysqli_error($conn));

    header("Location: park.php");
}
?>

<div class="content">
    <h1>Tambah Skate Park</h1>
    <div class="formTambah">
        <b><a href="product.php">
                < List Park</a></b>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">
                <label for="nama">Nama Park</label>
                <input type="text" name="nama" autofocus required>
            </div>
            <div class="box">
                <label for="brand">Alamat</label>
                <input type="text" name="alamat" required>
            </div>
            <div class="box">
                <label for="jenis">Lokasi</label>
                <input type="text" name="lokasi">
            </div>
            <div class="box">
                <label for="stock">Keterangan</label>
                <textarea name="ket" cols="38" rows="10"></textarea>
            </div>
            <div class="box">
                <label for="harga">Image</label>
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