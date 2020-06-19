<?php
if (isset($_GET['p'])) {
    $page = $_GET['p'];
    switch ($page) {

        case 'data-barang':
            include "contents/data-barang.php";
            break;
        case 'data-penjualan':
            include "contents/data-penjualan.php";
            break;

        default:
            include 'contents/beranda.php';
            break;
    }
} else {
    include 'contents/beranda.php';
}
