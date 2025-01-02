<?php
include 'koneksi.php';
$hapus=mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id_hapus]'");

if ($hapus) {
    header('location:list_prodi.php');
}