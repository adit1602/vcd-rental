<?php
include "koneksi.php";

// Mendapatkan data dari form
$id_number = $conn->real_escape_string($_POST['id_number']);
$full_name = $conn->real_escape_string($_POST['full_name']);
$birthdate = $conn->real_escape_string($_POST['birthdate']);
$address = $conn->real_escape_string($_POST['address']);
$gender = $conn->real_escape_string($_POST['gender']);
$contact_info = $conn->real_escape_string($_POST['contact_info']);

// Query SQL untuk menyimpan data ke dalam tabel 'members'
$sql = "INSERT INTO members (id_number, full_name, birthdate, address, gender, contact_info) VALUES ('$id_number', '$full_name', '$birthdate', '$address','$gender', '$contact_info')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');window.location='index.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
