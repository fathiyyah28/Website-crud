
<h2>Data Berita</h2>
        <a href="?p=tambah_dosen" class="btn btn-primary mb-3">Tambah Berita</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User_id</th>
                    <th>Kategori_id</th>
                    <th>Judul_Berita</th>
                    <th>File_Upload</th>
                    <th>Isi_Berita</th>
                    <th>Date_Created</th>
                </tr>
            <?php
            include 'koneksi.php';
            $ambil=mysqli_query($db, "SELECT * FROM prodi");
            $no=1;
            while ($data=mysqli_fetch_array($ambil)){
            ?>
            <tr>
                <td><?= $no?></td>
                <td><?= $data['user_id'] ?></td>
                <td><?= $data['kategori_id'] ?></td>
                <td><?= $data['judul_berita'] ?></td>
                <td><?= $data['file_upload'] ?></td>
                <td><?= $data['isi_berita'] ?></td>
                <td><?= $data['date_created'] ?></td>
                <a href="hapus_berita.php?id_hapus=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ?')">Hapus</a>
                <a href="edit_berita.php?id_edit=<?= $data['id'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
