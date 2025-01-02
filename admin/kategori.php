<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori</h1>
</div>
<?php
include '../koneksi.php';
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {
        case 'list':
 ?>
            <div class="">
                <div class="py-3">
                    <a class="btn btn-primary" href="index.php?p=kategori&aksi=input">
                        <i class="bi bi-file-earmark-plus"></i> Tambah Kategori
                    </a>
                </div>
                <div class="p-4">
                    <table id="Table-kategori" class="table table-striped table-bordered p-3">
                        <thead>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php
                            $tampil=mysqli_query($db,"SELECT * FROM kategori");
                            $no=1;
                            while ($data=mysqli_fetch_array($tampil)){
                            ?>    
                                <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['nama_kategori'] ?></td>
                                    <td>
                                        <a href="index.php?p=kategori&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="proses_kategori.php?&proses=delete&id=<?php echo $data['id']?>" class="btn btn-danger" onclick="return confirm ('apakah data akan dihapus?')">
                                            <i class="bi bi-trash"></i> hapus
                                        </a>
                                    </td>
                                </tr>
                                
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
 <?php           
            break;
        
        case 'input':
 ?>
            <div class="container">
                <div class="row py-5">
                    <div class="col-8">
                        <form action="proses_kategori.php?proses=insert" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                            <input type="submit" name="submit" class="btn btn-primary">
                            <input type="reset" name="reset" class="btn btn-warning"></input>
                            </div>
                        </form>
                    </div>
                    
                </div>


                
                
            </div>    
 <?php           
            break;
        
        case 'edit':              
            include '../koneksi.php';
            $edit=mysqli_query($db,"SELECT * FROM kategori WHERE id=$_GET[id]");
            $data=mysqli_fetch_array($edit);
            ?>
            <div class="container">
                <form action="proses_kategori.php?proses=update&id=<?php echo $_GET['id'] ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" value= "<?php echo"$data[nama_kategori]";?>">
                    </div>
                    <div class="mb-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                    <input type="reset" name="reset" class="btn btn-warning">
                    </div>
                </form>
                
            </div>
 <?php           
            break;
        
    
    }
?>



        
            <!-- <div class="container">
                <h1>Prodi</h1>

                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenjang Studi</label>
                        <select name="jen_studi" class="form-select">
                            <option value="">--Pilih Jejang--</option>
                            <option value="D3">Diploma 3</option>
                            <option value="D4">Diploma 4</option>
                            <option value="S2">Magister</option>
                            <option value="S3">Doktor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="ket" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                    <input type="submit" name="submit" class="btn btn-primary">
                    <input type="reset" name="reset" class="btn btn-warning"></input>
                    </div>
                </form>
                
            </div>-->
            
            <?php
                // if (isset($_POST['submit'])) {
                //     include 'koneksi.php';
                //     $simpan=mysqli_query($db,"INSERT INTO prodi(nama_prodi,jenjang_studi,keterangan) VAlUES ('$_POST[nama]','$_POST[jen_studi]','$_POST[ket]') ");
                //     if($simpan) {
                //         echo "<script> alert('Data berhasil disimpan')</script>";
                //         echo "<script>window.location.href='index.php?p=prodi'</script>";
                //     }
                // }
            ?> 
            