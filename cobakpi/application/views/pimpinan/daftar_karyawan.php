            <div class="wrapper wrapper-content  animated fadeInRight">
                <?php if(isset($bos)) { ?>
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_karyawan/tambah_karyawan')?>'"><i class="fa fa-plus"></i> Tambah Karyawan</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
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
                                                <button class="btn btn-info btn-s" onclick="location.href='<?php echo site_url('daftar_karyawan/edit_karyawan/'.$d['id_users'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-s btn-danger" onclick="if (confirm('Data karyawan akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_karyawan/hapus_karyawan/'.$d['id_users'])?>'"><i class="fa fa-trash"></i></button>
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