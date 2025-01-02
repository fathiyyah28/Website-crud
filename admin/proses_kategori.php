<?php
    include '../koneksi.php';
    switch ($_GET['proses']) {
        case 'insert':
            if (isset($_POST['submit'])) {
                $simpan=mysqli_query($db,"INSERT INTO kategori(nama_kategori) VAlUES ('$_POST[nama]') ");
                if($simpan) {
                    echo "<script> alert('Data berhasil disimpan')</script>";
                    echo "<script>window.location.href='index.php?p=kategori'</script>";
                }
            }
            break;
        
        case 'delete':
            $hapus=mysqli_query($db,"DELETE FROM kategori WHERE id=$_GET[id]" );

            if ($hapus) {
                header ("location:index.php?p=kategori");
            } else {
                print "gagal menghapus data";
            }
            break;
        
        case 'update':
            if (isset($_POST['submit'])) {
                $update=mysqli_query($db, "UPDATE kategori SET 
                    nama_kategori='$_POST[nama]'
                WHERE id=$_GET[id]");
            
                if ($update) {
                    echo "<script>window.location.href='index.php?p=kategori'</script>";
                }
                else {
                    echo "<script> alert('Data gagal diupdate')</script>";
                }
            }
            break;
        
    }
?>