<div class="container-xl">
    <h1>dosen</h1>
    <hr>
    <div class="p-4">
                    <table id="example" class="table table-striped table-bordered p-3" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama Dosen</th>
                                <th>email</th>
                                <th>Program Studi</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include 'koneksi.php';
                            $tampil=mysqli_query($db,"SELECT * FROM prodi INNER JOIN  dosen ON prodi.id=dosen.prodi_id");
                            $no=1;
                            while ($data=mysqli_fetch_array($tampil)){
                            ?>    
                                <tr>
                                    <td> <?php echo $no; ?></td>
                                    <td> <?php echo $data['nip'] ?></td>
                                    <td> <?php echo $data['nama_dosen'] ?></td>
                                    <td> <?php echo $data['email'] ?></td>
                                    <td> <?php echo $data['nama_prodi'] ?></td>    
                                    <td> <?php echo $data['no_telp'] ?></td>
                                    <td> <?php echo $data['alamat'] ?></td>
                                </tr>    
                            <?php
                            $no++;
                            }
                            ?>
                        </tbody>
                    </table>
    </div>
                
 </div>