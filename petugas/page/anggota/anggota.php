<a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-bottom: 8px;"><i class="fa fa-plus"></i>Tambah Data</a>

<a href="../laporan/laporan_anggota_pdf.php" target="blank" class="btn btn-default" style="margin-bottom: 8px"><i class="fa fa-file-pdf-o"></i> Cetak Laporan Anggota</a>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Program Studi</th>
                                           <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            $no = 1;

                                            $sql = $koneksi->query("select * from anggota");

                                            while ($data=$sql -> fetch_assoc()) {
                                            
                                            $jk = ($data['jk']=='l')?"Laki-Laki":"Wanita";

                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim'];?></td>
                                            <td><?php echo $data['nama_anggota'];?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                            <td><?php echo $jk;?></td>
                                            <td><?php echo $data['prodi'];?></td>
                                            <td class="btn-group">
                                                <a href="?page=anggota&aksi=ubah&no_anggota=<?php echo $data['no_anggota']; ?>" class="btn btn-info"><i class="fa fa-edit fa-1x"></i>Edit</a>
                                                <a onclick="return confirm('Anda Yakin Ingin menghapus Data ini ???')" href="?page=anggota&aksi=hapus&no_anggota=<?php echo $data['no_anggota']; ?>" class="btn btn-danger"><i class="fa fa-trash fa-1x">Hapus</i>
                                                <a href="../laporan/laporan_kartu_anggota_pdf.php?no_anggota=<?php echo $data['no_anggota']; ?>" target="blank" class="btn btn-warning" style="margin-bottom: 8px"><i class="fa fa-print fa-1x"></i>Cetak Kartu</a>
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