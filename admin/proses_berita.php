<?php 
include '../koneksi.php';
session_start();

$query= mysqli_query($db, "SELECT * FROM berita");
$table_query= mysqli_fetch_array($query); 
$old_files= $table_query['file_upload'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nama_file=$_FILES['fileToUpload']['name'];   
$nama_file_tmp=$_FILES['fileToUpload']['tmp_name'];   

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}


switch ($_GET['proses']) {
    case 'insert':        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $sql= mysqli_query($db, "INSERT INTO berita(user_id,kategori_id,judul_berita,file_upload,isi_berita) VALUES ('$_SESSION[user_id]','$_POST[kategori]','$_POST[judul]','$nama_file','$_POST[berita]')");

            if($sql){
                echo "<script> alert('Data berhasil disimpan')</script>";
                echo "<script>window.location.href='index.php?p=berita'</script>";
            }
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        break;

        
    case 'delete':
        $hapus=mysqli_query($db,"DELETE FROM berita where id=$_GET[id]" );
        unlink($target_dir.$_GET['file']);
        if ($hapus) {
            header ("location:index.php?p=berita");
        } else {
            print "gagal menghapus data";  
        } 
        break;


    case 'update':
        if(empty($_FILES['fileToUpload']['name'])){
            if (isset($_POST['submit'])) { 
                $update=mysqli_query($db, "UPDATE berita SET 
                            judul_berita='$_POST[judul]',
                            kategori_id='$_POST[kategori]',
                            isi_berita='$_POST[berita]' 
                        WHERE id=$_GET[id]");
                if ($update) {
                    echo "<script>window.location.href='index.php?p=berita'</script>";
                }
                else {
                    echo "<script> alert('Data gagal diupdate')</script>";
                }
                }
            echo "file Kosong";
        }
        else {
          unlink($target_dir.$old_files);
          if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
              $update= mysqli_query($db, "UPDATE berita SET 
                                        judul_berita='$_POST[judul]',
                                        kategori_id='$_POST[kategori]',
                                        file_upload='$nama_file',
                                        isi_berita='$_POST[berita]' 
                                    WHERE id=$_GET[id]");
              if($update){
                  echo "<script> alert('Data berhasil disimpan')</script>";
                  echo "<script>window.location.href='index.php?p=berita'</script>";
              }
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
          
        }

        break;
    

}
