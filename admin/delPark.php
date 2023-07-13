<?php
include "connectDb.php";
$id = $_GET['id'];
$pic = $_GET['pic'];

$qry = $conn->query("delete from park where id_park ='" . $id . "'");

unlink('../img/pic/' . $pic);

if ($qry) {
    header("Location: park.php");
} else {
    echo "<script>alert('Delete Gagal!!!')</script>";
}
