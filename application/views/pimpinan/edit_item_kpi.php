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
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content" style="background-color: white">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($item_kpi as $value) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('kpi/edit_item_kpi_form'); ?>" method="post">
                                        <div class="row form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nama Item KPI :</label>
                                                <div class="col-lg-9">
                                                    <input type="hidden" name="id_item_kpi" value="<?php echo $value['id_item_kpi']; ?>">
                                                    <input type="text" name="nama_item" class="form-control" value="<?php echo $value['nama_item']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Indikator :</label>
                                                <div class="col-lg-9">
                                                    <textarea name="indikator" class="form-control" required><?php echo $value['indikator']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Bobot Item :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                    <input type="number" name="bobot_item" class="form-control" value="<?php echo $value['bobot_item']; ?>" max="100" step="0.1" required><span class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Target Item :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                    <input type="number" name="target_item" class="form-control" value="<?php echo $value['target_item']; ?>" required><span class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <!-- <button type="reset" class="btn btn-w-m btn-warning">Reset</button> -->
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>