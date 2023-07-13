<?php
include "connectDb.php";
include "fungsi.php";
include "Template.php";

// error_reporting(0);

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

Theader('Product');


?>

<div class="content">
    <h1>Product</h1>
    <div class="tableProduct">
        <div class="topTable">
            <b><a href="tambahProduct.php" class="btnTambah">Tambah Product</a></b>
            <form action="" method="POST">
                <input type="text" name="keyword" placeholder="Cari Nama Product...">
                <button type="submit" name="cari">Cari</button>
            </form>
        </div>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Nama Product</th>
                    <th>Brand</th>
                    <th>Jenis Product</th>
                    <th>Stock</th>
                    <th>Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                $batas = 9;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $back = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($conn, "select * from product");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                if (isset($_POST['cari'])) {
                    $key = $_POST['keyword'];
                    $data_product = mysqli_query($conn, "select * from product where nama_product like '%$key%' limit $batas");
                } else {


                    $data_product = mysqli_query($conn, "select * from product limit $halaman_awal, $batas");
                    // $nomor = $halaman_awal + 1;
                }
                while ($d = mysqli_fetch_array($data_product)) {

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <img src="../img/pic/<?= $d['image']; ?>" alt="">
                        </td>
                        <td><?= $d['nama_product']; ?></td>
                        <td><?= $d['brand_product']; ?></td>
                        <td><?= $d['jenis_product']; ?></td>
                        <td><?= $d['stock']; ?></td>
                        <td>Rp.<?= Rupiah($d['harga']); ?></td>
                        <td>
                            <a href="editProduct.php?id=<?= $d['id_product']; ?>">Edit</a>
                            <a href="delProduct.php?id=<?= $d['id_product']; ?>&pic=<?= $d['image']; ?>" onclick="return confirm('Hapus Data Ini?');">Delete</a>
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