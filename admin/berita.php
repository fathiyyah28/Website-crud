<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Berita</h1>
</div>
<?php
    include '../koneksi.php';
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {
        case 'list':
?>  
             <div class="">
                <div class="py-3">  
                    <a class="btn btn-primary" href="index.php?p=berita&aksi=input">
                        <i class="bi bi-file-earmark-plus"></i> Tambah Berita
                    </a>
                </div>
                <div class="p-4">
                    <table id="Tabel-berita" class="table table-striped table-bordered p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>judul</th>
                                <th>Kategori</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Tanggal Diinput</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $tampil=mysqli_query($db,"SELECT * FROM user, kategori, berita WHERE user.id=berita.user_id AND kategori.id=berita.user_id");
                            $no=1;
                            while ($data=mysqli_fetch_array($tampil)){
                            ?>    
                                <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['judul_berita'] ?></td>
                                    <td> <?php echo $data['nama_kategori'] ?></td>
                                    <td> <?php echo $data['full_name'] ?></td>
                                    <td> <?php echo $data['email'] ?></td>    
                                    <td> <?php echo $data['date_created'] ?></td>
                                    <td>
                                        <a href="index.php?p=berita&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="proses_berita.php?proses=delete&id=<?php echo $data['id']?>&file=<?=$data['file_upload']?>"& class="btn btn-danger" onclick="return confirm ('apakah data akan dihapus?')">
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
                        <form action="proses_berita.php?proses=insert" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="judul">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="kategori" class="form-select">
                                        <option value="">--Pilih Kategori--</option>
                                        <?php 
                                            $ambil_kategori=mysqli_query($db,"SELECT * FROM kategori");
                                            while ($data_kategori=mysqli_fetch_array($ambil_kategori)) {
                                                echo "<option value=". $data_kategori['id'].">".$data_kategori['nama_kategori']."<option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">File Upload</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="fileToUpload">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Berita</label>
                                <div class="col-sm-8">
                                    <textarea name="berita" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">

                                    <input type="submit" name="submit" class="btn btn-primary">
                                    <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                
                                    <div>

                                    </div>
                                </div>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>

            </div>
<?php
            break;
        
        case 'edit':
            $edit=mysqli_query($db,"SELECT * FROM berita WHERE id=$_GET[id]");
            $data=mysqli_fetch_array($edit);
            ?>
            <div class="container">
                <div class="row py-5">
                    <div class="col-8">
                    <form action="proses_berita.php?proses=update&id=<?= $_GET['id']?>" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <input type="text" class="form-control" name="judul" value="<?= $data['judul_berita']?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="kategori" class="form-select">
                                        <option value="">--Pilih Kategori--</option>
                                        <?php 
                                            $ambil_kategori=mysqli_query($db,"SELECT * FROM kategori");
                                            while ($data_kategori=mysqli_fetch_array($ambil_kategori)) {
                                                if ($data['kategori_id'] == $data_kategori['id'] ) {
                                                    echo "<option value=". $data_kategori['id']." selected >".$data_kategori['nama_kategori']."<option>";
                                                } else {
                                                    echo "<option value=". $data_kategori['id'].">".$data_kategori['nama_kategori']."<option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">File Upload</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="fileToUpload" value="<?= $data['file_upload']?>" id="file-upload">

                                    <div class="mt-3">
                                        <?php 
                                        if ($data['file_upload'] != ''){
                                            ?>
                                            <img src="images/<?= $data['file_upload'] ?>" alt="Preview Uploded Image"
                                            id="file-preview" width="300">
                                            <?php  
                                        }
                                        else{
                                            echo '<img src="#" alt="Preview Uploaded Image" id="file-preview">';    
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
                            </div>

                                            
                            <div class="rowmb-3">

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Berita</label>
                                <div class="col-sm-8">
                                    <textarea name="berita" class="form-control" rows="5"><?= $data['isi_berita'];?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">

                                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                    <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                
                                    <div>

                                    </div>
                                </div>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
<?php
            break;
        
        
    }
?>

<script>
    const input = document.getElementById('file-upload');
    const previewPhoto = () => {
        const file = input.files;
        if (file) {
            const fileReader = new FileReader();
            const preview = document.getElementById('file-preview');
    fileReader.onload = function (event) {
                preview.setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    }
    input.addEventListener("change", previewPhoto);
</script>