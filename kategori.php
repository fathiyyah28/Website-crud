<h2>Data Kategori</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama_Kategori</th>
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
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
