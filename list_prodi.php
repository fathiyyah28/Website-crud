
        <h2>Data Prodi</h2>
        <a href="?p=tambah_prodi" class="btn btn-primary mb-3">Tambah Prodi</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Prodi</th>
                    <th>Jenjang Studi</th>
                    <th>aksi</th>
                </tr>
            <?php
            include 'koneksi.php';
            $ambil=mysqli_query($db, "SELECT * FROM prodi");
            $no=1;
            while ($data=mysqli_fetch_array($ambil)){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $data['nama_prodi'] ?></td>
                <td><?= $data['jenjang_studi'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td>
                <a href="hapus_prodi.php?id_hapus=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ?')">Hapus</a>
                <a href="edit_prodi.php?id_edit=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
