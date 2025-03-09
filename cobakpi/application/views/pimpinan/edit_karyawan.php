<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo $title; ?></h5>
                </div>
                <div class="ibox-content" style="background-color: white">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="m-t" role="form" action="<?php echo site_url('daftar_karyawan/edit_karyawan_form/'.$karyawan['id_users']); ?>" method="post">
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
                                            <input type="text" name="username" class="form-control" value="<?php echo $karyawan['username']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Password :</label>
                                        <div class="col-lg-9">
                                            <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah">
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
                                            <input type="text" name="nama_karyawan" class="form-control" value="<?php echo $karyawan['nama_karyawan']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Jabatan :</label>
                                        <div class="col-lg-9">
                                            <select name="jabatan" class="form-control">
                                                <option value="<?php echo $karyawan['jabatan']; ?>" selected><?php echo $karyawan['jabatan']; ?></option>
                                                <option value="AO Commercial">AO Commercial</option>
                                                <option value="AO Consumer">AO Consumer</option>
                                                <option value="AO Program">AO Program</option>
                                                <option value="Funding Officer">Funding Officer</option>
                                                <option value="Sekretariat SDM">Sekretariat SDM</option>
                                                <option value="Logistik">Logistik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Umur :</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="umur" class="form-control" value="<?php echo $karyawan['umur']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Alamat :</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $karyawan['alamat']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Nomor HP :</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="no_hp" class="form-control" value="<?php echo $karyawan['no_hp']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Tanggal Masuk :</label>
                                        <div class="col-lg-9">
                                            <div class="input-group date">
                                                <input id="date_added" name="tanggal_masuk" placeholder="YYYY-MM-DD" type="text" class="form-control" value="<?php echo $karyawan['tanggal_masuk']; ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                                    <input type="text" name="sma" class="form-control" value="<?php echo $karyawan['sma']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S1 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s1" class="form-control" value="<?php echo $karyawan['s1']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S2 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s2" class="form-control" value="<?php echo $karyawan['s2']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S3 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s3" class="form-control" value="<?php echo $karyawan['s3']; ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                        <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
