<a href="?page=buku&aksi=tambah" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-plus"></i>Tambah Data</a>

<a href="../laporan/laporan_buku_pdf.php" target="blank" class="btn btn-default" style="margin-bottom: 8px"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Buku</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Lokasi</th>
                                            <th>ISBN</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi ->query("select * from buku");

                                            while ($data=$sql -> fetch_assoc()) {
                                            
                                            

                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['kategori'];?></td>
                                            <td><?php echo $data['pengarang'];?></td>
                                            <td><?php echo $data['penerbit'];?></td>
                                            <td><?php echo $data['tahun_terbit'];?></td>
                                            <td><?php echo $data['lokasi'];?></td>
                                            <td><?php echo $data['isbn'];?></td>
                                            <td>
                                                <a href="?page=buku&aksi=ubah&kode_buku=<?php echo $data['kode_buku']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Ingin menghapus Data ini ???')" href="?page=buku&aksi=hapus&kode_buku=<?php echo $data['kode_buku']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
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