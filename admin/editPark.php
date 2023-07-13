<?php
include "connectDb.php";
include "Template.php";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Edit Skate Park');

$id = $_GET['id'];
$qry = $conn->query("select * from park where id_park='" . $id . "'");
$data = $qry->fetch_array();


if (isset($_POST['edit'])) {
    $nama   = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $lokasi  = $_POST['lokasi'];
    $ket  = $_POST['ket'];

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

    $qry = $conn->query("update park set 
        nama_park='$nama',
        alamat='$alamat',
        lokasi='$lokasi',
        keterangan='$ket',
        image='$namabaru' where id_park='$id'");

    if ($qry) {
        header("Location: park.php");
    } else {
        echo "ada yang salah";
    }
}
?>

<div class="content">
    <h1>Edit Skate Park</h1>
    <div class="formTambah">
        <b><a href="product.php">
                < List Park</a></b>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">
                <label for="nama">Nama Park</label>
                <input type="text" name="nama" autofocus value="<?= $data['nama_park']; ?>">
            </div>
            <div class="box">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" value="<?= $data['alamat']; ?>">
            </div>
            <div class="box">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" value="<?= $data['lokasi']; ?>">
            </div>
            <div class="box">
                <label for="ket">Keterangan</label>
                <textarea name="ket" cols="38" rows="10"><?= $data['keterangan']; ?></textarea>
            </div>
            <div class="box">
                <label for="img">Image</label>
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