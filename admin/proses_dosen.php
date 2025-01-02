<?php 
    include '../koneksi.php';
    switch ($_GET['proses']) {
        case 'insert':
            if (isset($_POST['submit'])) {    
                $sql=mysqli_query($db, "INSERT INTO dosen(nip,nama_dosen,email,prodi_id,no_telp,alamat) VALUES('$_POST[nip]','$_POST[nama]','$_POST[email]','$_POST[prodi]','$_POST[no_telp]','$_POST[alamat]')");
                if ($sql) {
                    echo "<script> alert('Data berhasil disimpan')</script>";
                    echo "<script>window.location.href='index.php?p=dosen'</script>";
                }
            }
            break;
        
        case 'delete':
            $hapus=mysqli_query($db,"delete from dosen where id=$_GET[id]" );

            if ($hapus) {
                header ("location:index.php?p=dosen");
            } else {
                print "gagal menghapus data";  
            } 
            break;
        

        case 'update':
            if (isset($_POST['submit'])) { 
                $update=mysqli_query($db, "UPDATE dosen SET 
                            nip='$_POST[nip]', 
                            nama_dosen='$_POST[nama]', 
                            email='$_POST[email]',
                            prodi_id='$_POST[prodi]',
                            alamat='$_POST[alamat]' 
                        WHERE id=$_GET[id]");
                if ($update) {
                    echo "<script>window.location.href='index.php?p=dosen'</script>";
                }
                else {
                    echo "<script> alert('Data gagal diupdate')</script>";
                }
            }

        }

?>