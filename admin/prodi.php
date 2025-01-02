<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Prodi</h1>
</div>

<?php
include '../koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>
        <div>
            <div class="py-3">
                <a class="btn btn-primary" href="index.php?p=prodi&aksi=input">
                    <i class="bi bi-file-earmark-plus"></i> Tambah Prodi
                </a>
            </div>
            <div class="p-4">
                <table id="Tabel-prodi" class="table table-striped table-bordered p-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang Studi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tampil = mysqli_query($db, "SELECT * FROM prodi");
                        $no = 1;
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_prodi'] ?></td>
                                <td><?= $data['jenjang_studi'] ?></td>
                                <td><?= $data['keterangan'] ?></td>
                                <td>
                                    <a href="index.php?p=prodi&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="proses_prodi.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')">
    <i class="bi bi-trash"></i> Hapus
</a>
                                </td>
                            </tr>
                        <?php } ?>
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
                    <form action="proses_prodi.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenjang Studi</label>
                            <select name="jen_studi" class="form-select">
                                <option value="">--Pilih Jenjang--</option>
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
                            <input type="reset" name="reset" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
        break;

    case 'edit':
        $edit = mysqli_query($db, "SELECT * FROM prodi WHERE id=$_GET[id]");
        $data = mysqli_fetch_array($edit);
?>
        <div class="container">
            <div class="row py-5">
                <div class="col-8">
                    <form action="proses_prodi.php?proses=update&id=<?= $_GET['id']; ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['nama_prodi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenjang Studi</label>
                            <select name="jen_studi" class="form-select">
                                <option value="">--Pilih Jenjang--</option>
                                <option value="D3" <?= ($data['jenjang_studi'] == 'D3') ? 'selected' : '' ?>>Diploma 3</option>
                                <option value="D4" <?= ($data['jenjang_studi'] == 'D4') ? 'selected' : '' ?>>Diploma 4</option>
                                <option value="S2" <?= ($data['jenjang_studi'] == 'S2') ? 'selected' : '' ?>>Magister</option>
                                <option value="S3" <?= ($data['jenjang_studi'] == 'S3') ? 'selected' : '' ?>>Doktor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="ket" class="form-control"><?= $data['keterangan']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning">
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
        break;
}
?>
