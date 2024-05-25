<?php
include "koneksi.php";
// Fungsi untuk menambahkan data VCD
function tambahDataVCD($kode, $judul, $kategori)
{
    global $conn;
    $status = "Tersedia"; // Default status ketersediaan

    // Mencegah SQL Injection
    $kode = $conn->real_escape_string($kode);
    $judul = $conn->real_escape_string($judul);
    $kategori = $conn->real_escape_string($kategori);
    $status = $conn->real_escape_string($status);

    $sql = "INSERT INTO tb_vcd (kode_vcd, judul_vcd, kategori, status) VALUES ('$kode', '$judul', '$kategori', '$status')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        // Mencetak pesan kesalahan
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

// Fungsi untuk mendapatkan data VCD
function getDataVCD()
{
    global $conn;
    $sql = "SELECT * FROM tb_vcd";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array();
    }
}

// Fungsi untuk mengupdate status ketersediaan VCD
function updateStatusVCD($kode, $status)
{
    global $conn;
    $sql = "UPDATE vcd_data SET status='$status' WHERE kode_vcd='$kode'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function getDataPeminjam()
{
    global $conn;
    // Query SQL untuk mengambil semua data peminjaman
    $query = "SELECT * FROM tb_transaksi";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID Transaksi</th><th>Kode Anggota</th><th>Kode VCD</th><th>Tanggal Sewa</th><th>Tarif Sewa</th><th>Tanggal Pengembalian</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_transaksi"] . "</td><td>" . $row["kode_anggota"] . "</td><td>" . $row["kode_vcd"] . "</td><td>" . $row["tanggal_sewa"] . "</td><td>" . $row["tarif_sewa"] . "</td><td>" . $row["tanggal_pengembalian"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
