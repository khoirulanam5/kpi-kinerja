            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('nilai_realisasi/tambah_nilai')?>'"><i class="fa fa-plus"></i> Tambah Nilai Realisasi</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>Tahun</td>
                                            <td>Bulan</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($bulan_realisasi != NULL) foreach($bulan_realisasi as $t) { ?>
                                        <tr>
                                            <td><?php echo $t['tahun']; ?></td>
                                            <td><?php echo get_bulan($t['bulan']); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-success dim" onclick="location.href='<?php echo site_url('nilai_realisasi/detail_realisasi/'.$t['bulan'])?>'" type="button"><i class="fa fa-eye"></i></button>
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('nilai_realisasi/edit_nilai/'.$t['bulan'])?>'" type="button" <?php // echo $t['tahun'] != date("Y") ? 'disabled' : ''; ?>><i class="fa fa-edit"></i></button>
                                                </div>
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