<div class="container-xl">
    <h1>Prodi</h1>
    <hr>
                <div class="p-4">
                    <table class="table table-striped table-bordered p-3" id="example1">
                        <thead>
                            <th>No</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang Studi</th>
                            <th>Keterangan</th>
                        </thead>
                        <?php
                            include 'koneksi.php';
                            $tampil=mysqli_query($db,"select * from prodi");
                            $no=1;
                            while ($data=mysqli_fetch_array($tampil)){
                            ?>    
                                <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['nama_prodi'] ?></td>
                                    <td> <?php echo $data['jenjang_studi'] ?></td>
                                    <td> <?php echo $data['keterangan'] ?></td>
                                </tr>
                            <?php
                            $no++;
                            }
                            ?>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
