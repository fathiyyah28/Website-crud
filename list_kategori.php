<h2>Data Kategori</h2>
        <a href="?p=tambah_kategori" class="btn btn-primary mb-3">Tambah Kategori</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                </tr>
            <?php
            include 'koneksi.php';
            $ambil=mysqli_query($db, "SELECT * FROM kategori");
            $no=1;
            while ($data=mysqli_fetch_array($ambil)){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $data['nama_kategori'] ?></td>
                <a href="index.php?p=kategori&aksi=edit&id_edit=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="proses_kategori.php?proses=delete&id_hapus=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
