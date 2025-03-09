            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Pegawai</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-sm-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover pimpinan" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama</td>
                                            <td>Jabatan</td>
                                            <td>Umur</td>
                                            <td>Alamat</td>
                                            <td>Nomor HP</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_karyawan != NULL) foreach($daftar_karyawan as $key => $d) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td>
                                                <?php 
                                                    if(isset($d['nama_karyawan'])){ 
                                                        echo $d['nama_karyawan']; 
                                                    }else{ 
                                                        echo $d['nama_pimpinan']; 
                                                    } 
                                                ?>
                                            </td>
                                            <td><?php echo $d['jabatan']; ?></td>
                                            <td><?php echo $d['umur']; ?></td>
                                            <td><?php echo $d['alamat']; ?></td>
                                            <td><?php echo $d['no_hp']; ?></td>
                                            <td>
                                                <?php if(isset($bos)) { ?>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('nilai_realisasi_pimpinan/daftar_nilai/'.$d['id_karyawan'].'/'.urlencode($d['nama_karyawan']))?>'" type="button"><i class="fa fa-edit"></i> Realisasi</button>
                                                <?php }else{ ?>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('nilai_realisasi_pimpinan/daftar_nilai_pimpinan/'.$d['id_pimpinan'].'/'.urlencode($d['nama_pimpinan']))?>'" type="button"><i class="fa fa-edit"></i> Realisasi</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>