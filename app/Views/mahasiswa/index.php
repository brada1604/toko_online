        <tr align="center">
            <td colspan="5">            

                <div class="mb-9">
                    <a class="tombol" href="<?php echo base_url('/mahasiswa/add')?>"><button type="button" class="btn btn-primary">+ Tambah Data Baru</button></a>
                </div>
                <div class="mb-3">
                    <form action="/mahasiswa/search" method="post">
                        <table>
                            <tr>
                                <td>Nama : </td>
                                <td><input type="text" class="form-control" name="nama"></td>    
                                <td><input type="submit" class="btn btn-success" value="Search"></td>                
                            </tr>    
                        </table>
                    </form>
                </div>

                <table class="table table-bordered table-warning table-striped table-hover" id="myTable">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $nomor = 1; 
                        foreach($getMahasiswa as $row):
                    ?>
                        <tr align="center">
                            <td><?= $nomor++; ?></td>
                            <td><?= $row->nim;?></td>
                            <td><?= $row->nama;?></td>
                            <td><?= $row->umur;?></td>
                            <td>
                                <a class="edit" class="btn btn-warning" href="/mahasiswa/edit/<?= $row->id;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a class="hapus" class="btn btn-danger" href="/mahasiswa/delete/<?= $row->id;?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                <a class="detail" class="btn btn-info" href="/mahasiswa/<?= $row->id;?>"><button type="button" class="btn btn-info">Info</button></a>                   
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            </td>
        </tr>