<?php
include "koneksi.php";

// Mendapatkan data dari form
$id_transaksi = isset($_POST['id_transaksi']) ? $conn->real_escape_string($_POST['id_transaksi']) : '';
$kode_anggota = $conn->real_escape_string($_POST['kode_anggota']);
$kode_vcd = $conn->real_escape_string($_POST['kode_vcd']);
$tanggal_sewa = $conn->real_escape_string($_POST['tanggal_sewa']);
$tarif_sewa = $conn->real_escape_string($_POST['tarif_sewa']);
$tanggal_pengembalian = $conn->real_escape_string($_POST['tanggal_pengembalian']);

// Query SQL untuk menyimpan data ke dalam tabel 'peminjaman'
$sql = "INSERT INTO tb_transaksi (id_transaksi, kode_anggota, kode_vcd, tanggal_sewa, tarif_sewa, tanggal_pengembalian) VALUES ('$id_transaksi', '$kode_anggota', '$kode_vcd', '$tanggal_sewa', '$tarif_sewa', '$tanggal_pengembalian')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data peminjaman berhasil ditambahkan');window.location='index.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
