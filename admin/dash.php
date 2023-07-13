<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

include "Template.php";
Theader('Dashboard');
?>

<div class="content">
    <h1>Halaman Dashboard</h1>
</div>

<?php
Tfooter();
?>