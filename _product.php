<?php include "admin/connectDb.php"; ?>

<div class="items">
    <div class="hed">
        <h3>Deck</h3>
        <div class="line">.</div>
    </div>
    <div class="board">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM product WHERE jenis_product = 'Deck'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="item">
                <img src="img/pic/<?= $data['image']; ?>" alt="">
                <p><?= $data['nama_product']; ?></p>
                <span><b>Stock <?= $data['stock']; ?></b></span>
                <div class="btn">
                    <a href="sell.php?id=<?= $data['id_product']; ?>">Buy</a>
                    <a href="chart.php">Chart</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="items">
    <div class="hed">
        <h3>Shoes</h3>
        <div class="line">.</div>
    </div>
    <div class="board">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM product WHERE jenis_product = 'Shoes'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="item">
                <img src="img/pic/<?= $data['image']; ?>" alt="">
                <p><?= $data['nama_product']; ?></p>
                <span><b>Stock <?= $data['stock']; ?></b></span>
                <div class="btn">
                    <a href="sell.php?id=<?= $data['id_product']; ?>">Buy</a>
                    <a href="chart.php">Chart</a>
                </div>
            </div>
        <?php } ?>

    </div>

</div>

<div class="items">
    <div class="hed">
        <h3>Truck</h3>
        <div class="line">.</div>
    </div>
    <div class="board">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM product WHERE jenis_product = 'Truck'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="item">
                <img src="img/pic/<?= $data['image']; ?>" alt="">
                <p><?= $data['nama_product']; ?></p>
                <span><b>Stock <?= $data['stock']; ?></b></span>
                <div class="btn">
                    <a href="sell.php?id=<?= $data['id_product']; ?>">Buy</a>
                    <a href="chart.php">Chart</a>
                </div>
            </div>
        <?php } ?>

    </div>

</div>

<div class="items">
    <div class="hed">
        <h3>Wheels</h3>
        <div class="line">.</div>
    </div>
    <div class="board">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM product WHERE jenis_product = 'Wheels'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <div class="item">
                <img src="img/pic/<?= $data['image']; ?>" alt="">
                <p><?= $data['nama_product']; ?></p>
                <span><b>Stock <?= $data['stock']; ?></b></span>
                <div class="btn">
                    <a href="sell.php?id=<?= $data['id_product']; ?>">Buy</a>
                    <a href="chart.php">Chart</a>
                </div>
            </div>
        <?php } ?>

    </div>

</div>