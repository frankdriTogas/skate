<?php 

// fungsi mata uang Rupiah
function Rupiah($angka)
{
    $rp = number_format($angka, 0, ',', '.');
    return $rp;
}
