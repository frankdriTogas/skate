<?php
include "connectDb.php";
$id = $_GET['id'];
$pic = $_GET['pic'];

$qry = $conn->query("delete from product where id_product ='" . $id . "'");

unlink('../img/pic/' . $pic);

if ($qry) {
    header("Location: product.php");
} else {
    echo "<script>alert('Delete Gagal!!!')</script>";
}
