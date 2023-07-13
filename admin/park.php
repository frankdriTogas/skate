<?php
include "connectDb.php";
include "Template.php";

// error_reporting(0);

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Park');


?>

<div class="content">
    <h1>Skate Park</h1>
    <div class="tableProduct">
        <div class="topTable">
            <b><a href="tambahPark.php" class="btnTambah">Tambah Skate Park</a></b>
            <form action="" method="POST">
                <input type="text" name="keyword" placeholder="Cari Nama Park...">
                <button type="submit" name="cari">Cari</button>
            </form>
        </div>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Nama Skate Park</th>
                    <th>Alamat</th>
                    <th>Lokasi</th>
                    <th>Ket.</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                $batas = 10;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $back = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($conn, "select * from park");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                if (isset($_POST['cari'])) {
                    $key = $_POST['keyword'];
                    $data_product = mysqli_query($conn, "select * from park where nama_product like '%$key%'");
                } else {


                    $data_product = mysqli_query($conn, "select * from park limit $halaman_awal, $batas");
                    // $nomor = $halaman_awal + 1;
                }
                while ($d = mysqli_fetch_array($data_product)) {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <img src="../img/pic/<?= $d['image']; ?>" class="img" alt="">
                        </td>
                        <td><?= $d['nama_park']; ?></td>
                        <td><?= $d['alamat']; ?></td>
                        <td><?= $d['lokasi']; ?></td>
                        <td><?= substr($d['keterangan'], 0, 50); ?></td>
                        <td>
                            <a href="editPark.php?id=<?= $d['id_park']; ?>">Edit</a>
                            <a href="delPark.php?id=<?= $d['id_park']; ?>&pic=<?= $d['image']; ?>" onclick="return confirm('Hapus Data Ini?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <ul>
                <li><a <?php if ($halaman > 1) {
                            echo "href='?halaman=$back'";
                        } ?>>Back</a></li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li><a href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                <?php } ?>

                <li><a <?php if ($halaman < $total_halaman) {
                            echo "href='?halaman=$next'";
                        } ?>>Next</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
Tfooter();
?>