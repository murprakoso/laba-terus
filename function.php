<?php
// koneksi ke database
require 'database.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// generate angka menjdi mata uang rupiah
function rupiah($angka)
{
    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

// 
function tambahDataPenjualan()
{
    global $conn;

    $id = uniqid();
    $kode = $_POST['kode_brg'];
    $qty = $_POST['qty'];

    // jika diskon dan bonus tidak kosong
    if (!empty($_POST['discount']) && !empty($_POST['bonus'])) {
        $bonus = $_POST['bonus'];
        mysqli_query($conn, "INSERT INTO jual VALUES ('$id','$kode', '$qty', 1, '$bonus')");
        return mysqli_affected_rows($conn);
    }
    // jika tidak diskon 
    elseif (empty($_POST['discount']) && !empty($_POST['bonus'])) {
        $bonus = $_POST['bonus'];
        mysqli_query($conn, "INSERT INTO jual VALUES ('$id','$kode', '$qty', 0, '$bonus')");
        return mysqli_affected_rows($conn);
    }
    // jika bonus
    elseif (!empty($_POST['discount']) && empty($_POST['bonus'])) {
        mysqli_query($conn, "INSERT INTO jual VALUES ('$id','$kode', '$qty', 1, 0)");
        return mysqli_affected_rows($conn);
    }
    // jika tidak diskon dan tidak bonus
    else {
        mysqli_query($conn, "INSERT INTO jual VALUES ('$id','$kode', '$qty', 0, 0)");
        return mysqli_affected_rows($conn);
    }
}

// **
// fungsi ubah data
// *
function ubahDataPenjualan()
{
    global $conn;

    $id = $_POST['id'];
    $kode = $_POST['kode_brg'];
    $qty = $_POST['qty'];

    // jika diskon dan bonus tidak kosong
    if (!empty($_POST['discount']) && !empty($_POST['bonus'])) {
        $bonus = $_POST['bonus'];
        mysqli_query($conn, "UPDATE jual SET kode='$kode', qty= '$qty',disc=1, bonus='$bonus' WHERE id='$id'");
        return mysqli_affected_rows($conn);
    }
    // jika tidak diskon 
    elseif (empty($_POST['discount']) && !empty($_POST['bonus'])) {
        $bonus = $_POST['bonus'];
        mysqli_query($conn, "UPDATE jual SET kode='$kode', qty= '$qty',disc=0,bonus='$bonus' WHERE id='$id'");
        return mysqli_affected_rows($conn);
    }
    // jika bonus
    elseif (!empty($_POST['discount']) && empty($_POST['bonus'])) {
        mysqli_query($conn, "UPDATE jual SET kode='$kode', qty= '$qty',disc=1,bonus=0 WHERE id='$id'");
        return mysqli_affected_rows($conn);
    }
    // jika tidak diskon dan tidak bonus
    else {
        mysqli_query($conn, "UPDATE jual SET kode='$kode', qty= '$qty',disc=0,bonus=0 WHERE id='$id'");
        return mysqli_affected_rows($conn);
    }
}

function hapusDataPenjualan()
{
    global $conn;
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM jual WHERE id='$id'");
    return mysqli_affected_rows($conn);
}
