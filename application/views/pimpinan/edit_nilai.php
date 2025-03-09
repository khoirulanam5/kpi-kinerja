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
                                <h5><?php echo $title.' Bulan '. get_bulan($bulan) ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <form class="m-t" role="form" action="<?php echo site_url('nilai_realisasi_pimpinan/edit_nilai_form/'.$bulan.'/'.$id_karyawan); ?>" method="post">
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
                                                <input type="hidden" name="id_nilai_kpi[]" value="<?php echo $n['id_nilai_kpi']; ?>">
                                                <?php if(satuan($n['id_item_kpi']) == 0) { ?>
                                                <div class="input-group">
                                                    <input type="number" name="nilai[]" class="form-control" value="<?php echo $n['nilai']; ?>" required>
                                                </div>
                                                <?php }else { ?>
                                                <div class="input-group">
                                                    <input type="number" name="nilai[]" class="form-control" value="<?php echo $n['nilai']; ?>" required>
                                                </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                </div>
                                </form>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>