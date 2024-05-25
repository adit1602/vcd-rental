<?php
session_start();
include "koneksi.php";
include('functions.php');

if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];

    // Panggil fungsi untuk menambahkan data VCD
    if (tambahDataVCD($kode, $judul, $kategori)) {
        echo "<script>alert('Data VCD berhasil ditambahkan');window.location='index.php'; </script>";
    } else {
        echo "Gagal menambahkan data VCD.";
    }
}
