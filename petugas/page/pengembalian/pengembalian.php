<a href="?page=pengembalian&aksi=tambah" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-plus"></i>Tambah Data</a>

<a href="../laporan/laporan_pengembalian_pdf.php" target="blank" class="btn btn-default" style="margin-bottom: 8px"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Peminjaman Buku</a>
<div class="row"> 
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    	<div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Pengembalian 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="10%">No Pengembalian</th>
                                            <th>Tanggal Dikembalikan</th>
                                            <th>Status Keterlambatan</th>
                                            <th>Terlambat </th>
                                            <th>Denda </th> 
                                            <th>No Peminjaman </th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    	<?php 
                                    		$sql = $koneksi ->query("select * from pengembalian"); 
                                    		while ($data=$sql -> fetch_assoc()) { 
                                    	?>
                                    	<tr>
                                    		<td><?php echo $data['no_pengembalian']; ?></td>
                                    		<td><?php echo $data['tgl_dikembalikan'];?></td>
                                            <td><?php echo $data['status_keterlambatan'];?></td>
                                            <td><?php echo $data['terlambat'];?></td>
                                    		<td><?php echo $data['denda'];?></td>
                                    		<td><?php echo $data['no_peminjaman'];?></td> 
                                    		<td class="btn-group">
                                    			<a href="?page=pengembalian&aksi=ubah&no_pengembalian=<?php echo $data['no_pengembalian']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Ingin menghapus Data ini ???')" href="?page=pengembalian&aksi=hapus&no_pengembalian=<?php echo $data['no_pengembalian']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                                <?php 
                                                if($data['status_keterlambatan']=='Terlambat') {
                                                ?>
                                                <a href="../laporan/cetak_struk.php?no_pengembalian=<?php echo $data['no_pengembalian']; ?>" class="btn btn-warning"><i class="fa fa-print"></i>Cetak Struk</a>
                                                <?php } ?>
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
</div>    