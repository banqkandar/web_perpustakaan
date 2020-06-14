<a href="?page=peminjaman&aksi=tambah" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-plus"></i>Tambah Data</a>

<a href="../laporan/laporan_peminjaman_pdf.php" target="blank" class="btn btn-default" style="margin-bottom: 8px"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Peminjaman Buku</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                    	<div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No Peminjaman</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>No Anggota </th>
                                            <th>Kode Buku </th> 
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    	<?php 
                                    		$sql = $koneksi ->query("select * from peminjaman inner join buku using (kode_buku)"); 
                                    		while ($data=$sql -> fetch_assoc()) { 
                                    	?>
                                    	<tr>
                                    		<td><?php echo $data['no_peminjaman']; ?></td>
                                    		<td><?php echo $data['tgl_peminjaman'];?></td>
                                            <td><?php echo $data['tgl_pengembalian'];?></td>
                                    		<td><?php echo $data['no_anggota'];?></td>
                                    		<td><?php echo $data['kode_buku'];?></td> 
                                    		<td>
                                    			<a href="?page=peminjaman&aksi=ubah&no_peminjaman=<?php echo $data['no_peminjaman']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Ingin menghapus Data ini ???')" href="?page=peminjaman&aksi=hapus&no_peminjaman=<?php echo $data['no_peminjaman']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
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