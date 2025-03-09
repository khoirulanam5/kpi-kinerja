            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                                <div class="text-right">
                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('profil_karyawan/edit_profil/')?>'" type="button"><i class="fa fa-edit"></i> Edit Profil</button>
                                </div>
                            </div>
                            <div class="ibox-content" style="background-color: white">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($profil as $p) { ?>
                                        <div class="row form-horizontal">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center"><strong>Data Akun</strong></h2>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Username :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['username']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Password :</label>
                                                <div class="col-lg-9">
                                                    <input type="password" class="form-control" value="<?php echo $p['password']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center"><strong>Profil</strong></h2>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nama :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['nama_karyawan']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Jabatan :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['jabatan']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Umur :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['umur']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Alamat :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['alamat']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nomor HP :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['no_hp']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Tanggal Masuk :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['tanggal_masuk']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Lama Kerja :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo date("Y") - date_format(date_create($p['tanggal_masuk']), 'Y'); ?> Tahun" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <h2 class="text-center"><strong>Riwayat Pendidikan</strong></h2>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">SMA/SMK :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['sma']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S1 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['s1']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S2 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['s2']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S3 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="<?php echo $p['s3']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>