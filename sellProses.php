<?php
include "admin/connectDb.php";

$stock = $_POST['stock'];
$id = $_POST['id'];
$jmlBarang = $_POST['jmlBarang'];

$newStock = $stock - $jmlBarang;

$qry = $conn->query("UPDATE product set stock = '$newStock' WHERE id_product = '$id'");

$i = 1;
while ($i <= $jmlBarang) {

    $qry = $conn->query("INSERT INTO sold set
            id_product = '$id',
            statuss = 'Deliver'
        ");
    $i++;
}


if ($qry) {
    // header("Location: sell.php?id=$id");
    echo "<script>alert('Transaksi Berhasil!!')</script>";
    echo "<script>window.location.href='sell.php?id=$id'</script>";
} else {
    echo "<script>alert('Transaksi Gagal!!!')</script>";
}
