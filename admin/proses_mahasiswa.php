<?php 
    include '../koneksi.php';
    switch ($_GET['proses']) {
        case 'insert':
            if (isset($_POST['submit'])) {    
                $hobies = implode(',',$_POST['hobi']);
                $tgl = $_POST['thn'] ."-". $_POST['bln']."-".$_POST['tgl'];
                $sql=mysqli_query($db, "INSERT INTO mahasiswa(nim,nama,tgl_lahir,jekel,prodi_id,hobi,email,alamat) VALUES('$_POST[nim]','$_POST[nama]','$tgl','$_POST[jk]','$_POST[prodi]','$hobies','$_POST[email]','$_POST[alamat]')");
                
                if ($sql) {
                    echo "<script> alert('Data berhasil disimpan')</script>";
                    echo "<script>window.location.href='index.php?p=mhs'</script>";
                }
            }
            break;
        

        case 'delete':
            $hapus=mysqli_query($db,"DELETE FROM mahasiswa WHERE nim=$_GET[nim]" );

            if ($hapus) {
                header ("location:index.php?p=mhs");
            } else {
                print "gagal menghapus data";  
            } 
            break;
        

        case 'update':
            if (isset($_POST['submit'])) { 
                $hobies = implode(',',$_POST['hobi']);
                $tgl = $_POST['thn'] ."-". $_POST['bln']."-".$_POST['tgl'];
                $update=mysqli_query($db, "UPDATE mahasiswa SET nim='$_POST[nim]', nama='$_POST[nama]', tgl_lahir='$tgl',jekel='$_POST[jekel]',prodi_id='$_POST[prodi]',hobi='$hobies',email='$_POST[email]',alamat='$_POST[alamat]' WHERE nim=$_GET[nim]");
                if ($update) {
                    echo "<script>window.location.href='index.php?p=mhs'</script>";
                }
                else {
                    echo "<script> alert('Data gagal diupdate')</script>";
                }
            }

        }

?>