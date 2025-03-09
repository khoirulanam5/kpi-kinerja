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
                                        <form class="m-t" role="form" action="<?php echo site_url('kpi/do_add_item_kpi'); ?>" method="post">
                                        <div class="row form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Devisi :</label>
                                                <div class="col-lg-9">
                                                <select name="id_divisi" class="form-control" required>
                                                    <option value="">Pilih Divisi</option>
                                                    <?php foreach ($divisi as $val): ?>
                                                        <option value="<?= $val->id_divisi ?>"><?= $val->nama_divisi ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nama Item KPI :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="nama_item" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Indikator :</label>
                                                <div class="col-lg-9">
                                                    <textarea name="indikator" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Bobot Item :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                    <input type="number" name="bobot_item" class="form-control" max="100" step="0.1" required><span class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Target Item :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                    <input type="number" name="target_item" class="form-control" required><span class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Tipe :</label>
                                                <div class="col-lg-9">
                                                    <select name="tipe_scorecard" class="form-control" required>
                                                        <option value="">Pilih Tipe Scorecard</option>
                                                        <option value="dalam">Dalam</option>
                                                        <option value="luar">Luar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
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