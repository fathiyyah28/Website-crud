<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mahasiswa</h1>
      </div>

<?php
 include '../koneksi.php';
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

    switch ($aksi) {
        case 'list':
?>
    <div class="container">
    <!-- Tombol Tambah Mahasiswa -->
    <div class="row py-3">
        <div class="col-md-12 text-start">
            <a class="btn btn-primary mb-3" href="index.php?p=mhs&aksi=input">Tambah Mahasiswa</a>
        </div>
    </div>

    <!-- Tabel Mahasiswa -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="Tabel-mahasisswa" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Program Studi</th>
                            <th>Hobi</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambil = mysqli_query($db, "SELECT * FROM prodi, mahasiswa WHERE prodi.id = mahasiswa.prodi_id");
                        $no = 1;
                        while ($data = mysqli_fetch_array($ambil)) {
                        ?>
                            <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['nim'] ?></td>
                                    <td> <?php echo $data['nama'] ?></td>
                                    <td> <?php echo $data['tgl_lahir'] ?></td>
                                    <td>
                                        <?php 
                                            switch ($data['jekel']) {
                                                case 'P':
                                                    echo "Perempuan";
                                                    break;
                                                
                                                default:
                                                    echo "Laki-laki";
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td> <?php echo $data['nama_prodi'] ?></td>    
                                    <td> <?php echo $data['hobi'] ?></td>
                                    <td> <?php echo $data['email'] ?></td>
                                    <td> <?php echo $data['alamat'] ?></td>
                                    <td>
                                        <a href="index.php?p=mhs&aksi=edit&nim=<?php echo $data['nim']?>" class="btn btn-success">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="proses_mahasiswa.php?proses=delete&nim=<?php echo $data['nim']?>" class="btn btn-danger" onclick="return confirm ('apakah data akan dihapus?')">
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
    </div>
</div>


<?php
            break;
        
        case 'input' :
?>
<h3>Form Mahasiswa</h3>
<div class="container">
                <div class="row py-5">
                    <div class="col-8">
                        <form action="proses_mahasiswa.php?proses=insert" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nim</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nim">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-2">
                                    <select name="tgl" class="form-control">
                                        <option value="">--DD--</option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="bln" class="form-control">
                                        <option value="">--MM--</option>
                                        <?php
                                        $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        foreach ($bulan as $key => $namaBulan) {
                                            echo "<option value=" . $key . ">" . $namaBulan . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="thn" class="form-control">
                                        <option value="">--YY--</option>
                                        <?php
                                        for ($i = date('Y'); $i >= 1980; $i--) {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="L" checked>
                                        <label class="form-check-label">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="P">
                                        <label class="form-check-label">
                                            Perempuan
                                        </label>
                                    </div>
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

                                <label class="col-sm-3 col-form-label">Hobi</label>
                                <div class="col-sm-8">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Membaca">
                                        <label class="form-check-label">
                                            Membaca
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga">
                                        <label class="form-check-label">
                                            Olahraga
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Menulis">
                                        <label class="form-check-label">
                                            Menulis
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email">
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

        case 'edit' :
?>
    <?php
    $sql=mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
    $data=mysqli_fetch_array($sql);
    $tgl=explode('-',$data['tgl_lahir']);
    $hobi=explode(',',$data['hobi']);
    
    ?>
        <h3>Edit Mahasiswa</h3>
        <div class="container">
                <div class="row py-5">
                    <div class="col-8">
                        <form action="proses_mahasiswa.php?proses=update&nim=<?= $_GET['nim']?>" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nim</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nim" value= "<?php echo"$data[nim]";?>">
                                </div>
                            </div>
                            <div class= "row mb-3">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" value= "<?php echo"$data[nama]";?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-2">
                                    <select name="tgl" class="form-control">
                                        <option value="">--DD--</option>
                                        <?php
                                            for ($i = 1; $i<= 31; $i++) {
                                                if ($i == $tgl[2]) {
                                                    echo "<option value=" . $i . " selected >" . $i . "</option>";
                                                }
                                                else {
                                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="bln" class="form-control">
                                        <option value="">--MM--</option>
                                        <?php   
                                            $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            foreach ($bulan as $key => $namaBulan) {
                                                if ($key == $tgl[1]) {
                                                    echo "<option value=" . $key . " selected>" . $namaBulan . "</option>";
                                                } else {
                                                    echo "<option value=" . $key . ">" . $namaBulan . "</option>";
                                                }
                                                
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="thn" class="form-control">
                                        <option value="">--YY--</option>
                                        <?php
                                            for ($i = date('Y'); $i >= 1980; $i--) {
                                                if ($i == $tgl[0]) {
                                                    echo "<option value=" . $i . " selected >" . $i . "</option>";
                                                } else {
                                                    echo "<option value=" . $i . ">" . $i . "</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="jekel" value="L" 
                                            <?php 
                                                if ($data['jekel']== 'L') {
                                                    echo "checked";
                                                }
                                            ?>>
                                        <label class="form-check-label">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jekel" value="P" \
                                            <?php 
                                                if ($data['jekel']== 'P') {
                                                    echo "checked";
                                                }
                                            ?>>
                                        <label class="form-check-label">
                                            Perempuan
                                        </label>
                                    </div>
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

                                <label class="col-sm-3 col-form-label">Hobi</label>
                                <div class="col-sm-8">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Membaca" 
                                            <?php
                                                if (in_array('Membaca',$hobi)) {
                                                    echo "checked";
                                                }
                                            ?>
                                        >
                                        <label class="form-check-label">
                                            Membaca
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga"
                                            <?php
                                                if (in_array('Olahraga',$hobi)) {
                                                    echo "checked";
                                                }
                                            ?>
                                        >
                                        <label class="form-check-label">
                                            Olahraga
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Menulis"
                                            <?php
                                                if (in_array('Menulis',$hobi)) {
                                                    echo "checked";
                                                }
                                            ?>
                                        >
                                        <label class="form-check-label">
                                            Menulis
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value= "<?php echo"$data[email]";?>">
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


