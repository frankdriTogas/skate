<?php
include "admin/connectDb.php";
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $qry = $conn->query("INSERT INTO message set
        nama_pengirim='$nama',
        email_Pengirim='$email',
        pesan='$pesan'") or die(mysqli_error($conn));

    echo "<script>
            alert('Pesan Anda Berhasil dikirim!');
    </script>";
}
?>
<h1>Contact Us</h1>
<div class="con">
    <div class="boxContact">
        <form action="" method="POST">
            <div class="bx">
                <label for="">Nama</label>
                <input type="text" name="nama">
            </div>
            <div class="bx">
                <label for="">Email</label>
                <input type="email" name="email">
            </div>
            <div class="bx">
                <label for="">Pesan</label>
                <textarea name="pesan" cols="30" rows="10"></textarea>
            </div>
            <div class="bxx">
                <div></div>
                <button type="submit" name="kirim">Send</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
    <div class="boxSosmed">
        <ul>
            <li>
                <img src="img/icon/AVG - Copy.ico" alt="">
            </li>
            <li>
                <img src="img/icon/nVidia - Copy.ico" alt="">
            </li>
            <li>
                <img src="img/icon/orange - Copy.ico" alt="">
            </li>
        </ul>
        <hr>
        <h3>Our Best Support</h3>
        <ul class="support">
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
            <li><a href="">adidas</a></li>
        </ul>
    </div>
</div>