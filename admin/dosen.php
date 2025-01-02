<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dosen</h1>
</div>
<?php
    include '../koneksi.php';
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

    switch ($aksi) {
        case 'list':
?>  
             <div class="">
                <div class="py-3">  
                    <a class="btn btn-primary" href="index.php?p=dosen&aksi=input">
                        <i class="bi bi-file-earmark-plus"></i> Tambah Dosen
                    </a>
                </div>
                <div class="p-4">
                    <table id="Tabel-dosen" class="table table-striped table-bordered p-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama Dosen</th>
                                <th>Email</th>
                                <th>Program Studi</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $tampil=mysqli_query($db,"SELECT * FROM prodi INNER JOIN  dosen ON prodi.id=dosen.prodi_id");
                            $no=1;
                            while ($data=mysqli_fetch_array($tampil)){
                            ?>    
                                <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['nip'] ?></td>
                                    <td> <?php echo $data['nama_dosen'] ?></td>
                                    <td> <?php echo $data['email'] ?></td>
                                    <td> <?php echo $data['nama_prodi'] ?></td>    
                                    <td> <?php echo $data['no_telp'] ?></td>
                                    <td> <?php echo $data['alamat'] ?></td>
                                    <td>
                                        <a href="index.php?p=dosen&aksi=edit&id=<?php echo $data['id']?>" class="btn btn-success">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="proses_dosen.php?proses=delete&id=<?php echo $data['id']?>" class="btn btn-danger" onclick="return confirm ('apakah data akan dihapus?')">
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
                        <form action="proses_dosen.php?proses=insert" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nip</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nip">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <select name="prodi" class="form-select">
                                        <option value="">--Pilih Prodi--</option>
                                        <?php 
                                            $ambil_prodi=mysqli_query($db,"SELECT * FROM prodi");
                                            while ($data_prodi=mysqli_fetch_array($ambil_prodi)) {
                                                echo "<option value=". $data_prodi['id'].">".$data_prodi['nama_prodi']."<option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">No.Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_telp">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control" rows="5"></textarea>
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
            $edit=mysqli_query($db,"SELECT * FROM dosen WHERE id=$_GET[id]");
            $data=mysqli_fetch_array($edit);
            ?>

            
            <div class="container">
                <div class="row py-5">
                    <div class="col-8">
                        <form action="proses_dosen.php?proses=update&id=<?= $_GET['id']?>" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nip</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nip" value= "<?php echo"$data[nip]";?>">
                                </div>
                            </div>
                            <div class= "row mb-3">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" value= "<?php echo"$data[nama_dosen]";?>">
                                </div>
                            </div>

                            <div class= "row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value= "<?php echo"$data[email]";?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <select name="prodi" class="form-select">
                                        <option value="">--Pilih Prodi--</option>
                                        <?php 
                                            $ambil_prodi=mysqli_query($db,"SELECT * FROM prodi");
                                            while ($data_prodi=mysqli_fetch_array($ambil_prodi)) {
                                                if ($data['prodi_id'] == $data_prodi['id'] ) {
                                                    echo "<option value=". $data_prodi['id']." selected >".$data_prodi['nama_prodi']."<option>";
                                                } else {
                                                    echo "<option value=". $data_prodi['id'].">".$data_prodi['nama_prodi']."<option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control" rows="5"><?php echo"$data[alamat]";?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">

                                    <input type="submit" name="submit" class="btn btn-primary" value="update">
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
        
        
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>

    </html>