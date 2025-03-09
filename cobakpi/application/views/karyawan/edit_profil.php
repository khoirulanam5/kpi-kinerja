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
                                        <?php foreach ($profil as $p) { ?>
                                        <form class="m-t" role="form" action="<?php echo site_url('profil_karyawan/edit_profil_form'); ?>" method="post">
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
                                                    <input type="text" name="username" class="form-control" value="<?php echo $p['username']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Password :</label>
                                                <div class="col-lg-9">
                                                    <input type="password" name="password" class="form-control" value="<?php echo $p['password']; ?>" required>
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
                                                    <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $p['nama_karyawan']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Jabatan :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="jabatan" class="form-control" value="<?php echo $p['jabatan']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Umur :</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="umur" class="form-control" value="<?php echo $p['umur']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Alamat :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="alamat" class="form-control" value="<?php echo $p['alamat']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nomor HP :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="no_hp" class="form-control" value="<?php echo $p['no_hp']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Tanggal Masuk :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group date">
                                                        <input id="date_added" name="tanggal_masuk" placeholder="YYYY-MM-DD" type="text" class="form-control" value="<?php echo $p['tanggal_masuk']; ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
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
                                                    <input type="text" name="sma" class="form-control"value="<?php echo $p['sma']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S1 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s1" class="form-control" value="<?php echo $p['s1']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S2 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s2" class="form-control" value="<?php echo $p['s2']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S3 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s3" class="form-control" value="<?php echo $p['s3']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
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