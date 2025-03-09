            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> Karyawan Divisi <?php echo $this->session->userdata('nama_divisi'); ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover pimpinan" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama</td>
                                            <td>Jabatan</td>
                                            <td width="200px">Aksi</td>
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
                                            <td>
                                                <?php if(isset($bos)) { ?>
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('laporan_kpi_karyawan/history/'.$d['id_karyawan'].'/'.$d['nama_karyawan'])?>'" type="button"><i class="fa fa-history"></i> Lihat History KPI</button>
                                                <?php }else{ ?>
                                                    <button class="btn btn-primary dim" onclick="location.href='<?php echo site_url('laporan_kpi_karyawan/history/'.$d['id_pimpinan'].'/'.$d['nama_pimpinan'])?>'" type="button"><i class="fa fa-history"></i> Lihat History KPI</button>
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