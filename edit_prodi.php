<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <form action="prodi.php" method="post">
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-group">Nama Prodi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_prodi">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-sm-3 col-form-group">Jenjang studi</div>
                        <div class="col-sm-8">
                            <select name="jenjang_studi" class="form-select">
                                <option value="">pilih prodi</option>
                                <option value="D3">Diploma 3</option>
                                <option value="D4">Diploma 4</option>
                                <option value="S2">Magister (S2)</option>
                                <option value="S3">Dosktoral Degree (S3)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-8 col-form-group">Keterangan</label>
                        <div class="col sm-8">
                            <textarea name="keterangan" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-group"></label>
                        <div class="col-sm-8">
                            <input type="submit" name="submit" class="btn btn-primary">
                            <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>

                <?php
                include 'koneksi.php';
                    if (isset($_POST['submit'])) {
                        
                        $simpan=mysqli_query($db, "INSERT INTO prodi (nama_prodi,jenjang_studi,keterangan) VALUES ('$_POST[nama_prodi]','$_POST[jenjang_studi]','$_POST[keterangan]')");
                        if ($simpan) {
                            echo "<script>window.location='list_prodi.php'</script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>