<h2>Data Mahasiswa</h2>
        <table id="example"class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Hobi</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include 'koneksi.php';
                $ambil = mysqli_query($db, "SELECT * FROM prodi,mahasiswa WHERE prodi.id=mahasiswa.prodi_id");
                //$ambil = mysqli_query($db, "SELECT * FROM prodi INNER JOIN mahasiswa ON prodi.id=mahasiswa.prodi_id");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['tgl_lahir'] ?></td>
                        <td><?= $data['jekel'] ?></td>
                        <td><?= $data['nama_prodi'] ?></td>
                        <td><?= $data['hobi'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                       
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>



