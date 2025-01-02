<?php
include '../koneksi.php';

switch ($_GET['proses']) {
    case 'insert':
        if (isset($_POST['submit'])) {
            $simpan = mysqli_query(
                $db,
                "INSERT INTO prodi(nama_prodi, jenjang_studi, keterangan) 
                 VALUES ('$_POST[nama]', '$_POST[jen_studi]', '$_POST[ket]')"
            );

            if ($simpan) {
                echo "<script>alert('Data berhasil disimpan');</script>";
                echo "<script>window.location.href='index.php?p=prodi';</script>";
            }
        }
        break;

    case 'delete':
        $hapus = mysqli_query($db,"DELETE FROM prodi WHERE id=$_GET[id]");

        if ($hapus) {
            header("location:index.php?p=prodi");
        } else {
            echo "Gagal menghapus data";
        }
        break;

    case 'update':
        if (isset($_POST['submit'])) {
            $update = mysqli_query(
                $db,
                "UPDATE prodi SET 
                 nama_prodi='$_POST[nama]',
                 jenjang_studi='$_POST[jen_studi]', 
                 keterangan='$_POST[ket]' 
                 WHERE id=$_GET[id]"
            );

            if ($update) {
                echo "<script>window.location.href='index.php?p=prodi';</script>";
            } else {
                echo "<script>alert('Data gagal diupdate');</script>";
            }
        }
        break;
}
?>
