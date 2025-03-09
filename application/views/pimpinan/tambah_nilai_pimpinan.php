            <?php 
                function satuan($id_item_kpi) {
                    if(($id_item_kpi >= 9 && $id_item_kpi <= 13) || ($id_item_kpi >= 22 && $id_item_kpi <= 26)) {
                        return 0;
                    }else{
                        return 1;
                    }
                }
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <?php 
                                    setlocale(LC_ALL, 'IND');
                                    echo $title; 
                                ?>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <?php 
                                    $found = FALSE;
                                    foreach ($tahun_realisasi as $t) {
                                        if($t['bulan'] == strftime('%B')){
                                            $found = TRUE;
                                        }
                                    }

                                    if($found == FALSE) { 
                                ?>
                                <div class="table-responsive">
                                <form class="m-t" role="form" action="<?php echo site_url('nilai_realisasi_pimpinan/tambah_nilai_pimpinan_form'); ?>" method="post">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No. </td>
                                            <td>Nama Item</td>
                                            <td>Indikator</td>
                                            <td>Nilai</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($nilai_realisasi != NULL) foreach($nilai_realisasi as $key => $n) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $n['nama_item']; ?></td>
                                            <td><?php echo $n['indikator']; ?></td>
                                            <td>
                                                <input type="hidden" name="id_item_kpi[]" value="<?php echo $n['id_item_kpi']; ?>">
                                                <?php if($n['satuan_target'] == 'persen') { ?>
                                                <div class="input-group">
                                                    <input type="number" name="nilai[]" class="form-control" min="0" step="0.1" required>
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                                <?php }else { ?>
                                                <div class="input-group">
                                                    <span class="input-group-addon">Rp.</span>
                                                    <input type="number" name="nilai[]" class="form-control" required>
                                                </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                    <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                </div>
                                </form>
                                <?php }else { echo '<div class="alert alert-info text-center">Nilai Realisasi Bulan Ini Sudah Diinputkan! Silahkan Update Untuk Memperbarui.</div>'; } ?>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>