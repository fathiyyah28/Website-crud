<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1">User</h1>
</div>
<?php 
    include '../koneksi.php';
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {
        case 'list':
 ?>
            <div class="">
                <div class="py-3">
                    <a class="btn btn-primary" href="index.php?p=user&aksi=input"">
                        <i class="bi bi-file-earmark-plus"></i> Tambah User
                    </a>
                </div>
                <div class="p-4">
                    <table id="Tabel-prodi" class="table table-striped table-bordered p-3">
                        <thead>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                                $tampil=mysqli_query($db,"SELECT * FROM user");
                                $no=1;
                                while ($data=mysqli_fetch_array($tampil)){
                                ?>    
                                    <tr>
                                        <td> <?php echo $no; ?></td>
                                        <td> <?php echo $data['full_name'] ?></td>
                                        <td> <?php echo $data['email'] ?></td>
                                        <td> <?php echo $data['level'] ?></td>
                                        <td>
                                            <a href="index.php?p=user&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <a href="proses_user.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm ('apakah data akan dihapus?')">
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
                <div class="row py-3">
                    <div class="col-8">
                        <form action="proses_user.php?proses=insert" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">level</label>
                                <select name="level" class="form-select">
                                    <option value="">--Pilih level--</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">User</option>
                                </select>
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
            $edit=mysqli_query($db,"SELECT * FROM user WHERE id=$_GET[id]");
            $data=mysqli_fetch_array($edit);
            ?>
            <div class="container">
                <div class="row py-3">
                    <div class="col-8">
                        <form action="proses_user.php?proses=update&id=<?=$data['id']?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data['full_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">level</label>
                                <select name="level" class="form-select">
                                    <?php ($data['level']== 'admin') ?  'selected': '';
                                    ?>
                                    <option value="" <?=     ($data['level']== 'admin') ?  'selected': '';
                                    ?>>--Pilih level--</option>
                                    <option value="admin" <?= ($data['level']== 'admin') ?  'selected': '';
                                    ?>>Administrator</option>
                                    <option value="user" <?=($data['level']== 'user') ?  'selected': '';
                                    ?>>User</option>
                                </select>
                                </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                <input type="reset" name="reset" class="btn btn-warning"></input>
                            </div>
                        </form>
                    </div>
                    
                </div>    
            </div>
 <?php           
            break;
        
    
    }
?>
