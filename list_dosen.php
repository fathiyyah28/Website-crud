
<h2>Data Dosen</h2>
        <a href="?p=tambah_dosen" class="btn btn-primary mb-3">Tambah Dosen</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Prodi_id</th>
                    <th>Notelp</th>
                    <th>Alamat</th>
                </tr>
            <?php
            include 'koneksi.php';
            $ambil=mysqli_query($db, "SELECT * FROM prodi");
            $no=1;
            while ($data=mysqli_fetch_array($ambil)){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $data['nip'] ?></td>
                <td><?= $data['nama_dosen'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['prodi_id'] ?></td>
                <td><?= $data['notelp'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <a href="hapus_dosen.php?id_hapus=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ?')">Hapus</a>
                <a href="edit_dosen.php?id_edit=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
