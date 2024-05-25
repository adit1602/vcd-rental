<?php
include "koneksi.php";

// Query SQL untuk mengambil semua data peminjaman
$query = "SELECT * FROM tb_transaksi";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table width = 70%>";
    echo "<tr><th>ID Transaksi</th><th>Kode Anggota</th><th>Kode VCD</th><th>Tanggal Sewa</th><th>Tarif Sewa</th><th>Tanggal Pengembalian</th><th>Denda</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // Ubah string tanggal menjadi objek DateTime
        $tanggal_pengembalian = DateTime::createFromFormat('Y-m-d', $row["tanggal_pengembalian"]);
        $tanggal_sekarang = new DateTime();

        // Hitung selisih hari
        $selisih_hari = $tanggal_sekarang->diff($tanggal_pengembalian)->days;

        // Jika tanggal sekarang melebihi tanggal pengembalian, hitung denda
        $denda = 0;
        if ($tanggal_sekarang > $tanggal_pengembalian) {
            $denda = $selisih_hari * 5000; // Misal denda Rp5000 per hari
        }

        echo "<tr><td>" . $row["id_transaksi"] . "</td><td>" . $row["kode_anggota"] . "</td><td>" . $row["kode_vcd"] . "</td><td>" . $row["tanggal_sewa"] . "</td><td>" . $row["tarif_sewa"] . "</td><td>" . $row["tanggal_pengembalian"] . "</td><td>" . $denda . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

echo "<p><a href='index.php'>Kembali ke halaman utama</a></p>";

$conn->close();
