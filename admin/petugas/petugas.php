<a href="?page=petugas&aksi=tambah" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-plus"></i>Tambah Data</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                    	<div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Petugas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Petugas</th>
                                            <th>Alamat Petugas</th>
                                            <th>No Telepon Petugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    	<?php

                                    		$no = 1;

                                    		$sql = $koneksi ->query("select * from petugas");

                                    		while ($data=$sql -> fetch_assoc()) {
                                    		
                                    		

                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++; ?></td>
                                    		<td><?php echo $data['nama_petugas'];?></td>
                                            <td><?php echo $data['alamat_petugas'];?></td>
                                    		<td><?php echo $data['no_telp_petugas'];?></td>
                                    		<td>
                                    			<a href="?page=petugas&aksi=ubah&id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Ingin menghapus Data ini ???')" href="?page=petugas&aksi=hapus&id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                    		</td>
                                    	</tr>

                                    	<?php  } ?>
                                    </tbody>
                                </table>
                              </div>
                              
                     </div>
                </div>
          </div>
 	</div>