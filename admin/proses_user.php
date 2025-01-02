<?php 
    include '../koneksi.php';
    switch ($_GET['proses']) {
        case 'insert':
            $password = md5($_POST['password']);
            if (isset($_POST['submit'])) {    
                $sql=mysqli_query($db, "INSERT INTO 
                user(full_name,email,password,level) 
                VALUES('$_POST[nama]','$_POST[email]','$password','$_POST[level]')");
                if ($sql) {
                    echo "<script> alert('Data berhasil disimpan')</script>";
                    echo "<script>window.location.href='index.php?p=user'</script>";
                }
            }
            break;
        
        case 'delete':
            $hapus=mysqli_query($db,"DELETE FROM user WHERE id='$_GET[id]'" );

            if ($hapus) {
                header ("location:index.php?p=user");
            } else {
                print "gagal menghapus data";  
            } 
            break;
        

        case 'update':
            if (isset($_POST['submit'])) { 
                $update=mysqli_query($db, "UPDATE user SET 
                            full_name='$_POST[nama]',
                            email ='$_POST[email]',
                            level ='$_POST[level]' 
                        WHERE id=$_GET[id]");
                if ($update) {
                    echo "<script>window.location.href='index.php?p=user'</script>";
                }
                else {
                    echo "<script> alert('Data gagal diupdate')</script>";
                }
            }

        }

?>