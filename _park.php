<?php include "admin/connectDb.php" ?>

<h3>Skate Park</h3>
<div class="boxPark">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM park");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <div class="itemx">
            <img src="img/pic/<?= $data['image']; ?>" alt="">
            <p><b><?= $data['nama_park']; ?></b></p>
            <p><?= $data['alamat']; ?></p>
            <p><?= $data['lokasi']; ?></p>
        </div>
    <?php } ?>
</div>