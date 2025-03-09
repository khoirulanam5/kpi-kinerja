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
                                        <form class="m-t" role="form" action="<?php echo site_url('daftar_karyawan/tambah_karyawan_form'); ?>" method="post">
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
                                                    <input type="text" name="username" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Password :</label>
                                                <div class="col-lg-9">
                                                    <input type="password" name="password" class="form-control"  required>
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
                                                    <input type="text" name="nama_karyawan" class="form-control" required>
                                                </div>
                                            </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Jabatan :</label>
        <div class="col-lg-9">
            <?php if($this->session->userdata('jabatan') == 'Manajer Pemasaran') { ?>
            <select name="jabatan" class="form-control">
                <option value="AO Commercial">AO Commercial</option>
                <option value="AO Consumer">AO Consumer</option>
                <option value="AO Program">AO Program</option>
                <option value="Funding Officer">Funding Officer</option>
            </select>
            <?php }elseif($this->session->userdata('jabatan') == 'Supervisor ADK') {  ?>
            <select name="jabatan" class="form-control">
                <option value="ADK Commercial">ADK Commercial</option>
                <option value="ADK Consumer">ADK Consumer</option>
            </select>
            <?php }elseif($this->session->userdata('jabatan') == 'Supervisor Pely Intern') {  ?>
            <select name="jabatan" class="form-control">
                <option value="Sekretariat SDM">Sekretariat SDM</option>
                <option value="Logistik">Logistik</option>
                <option value="LAIM">LAIM</option>
            </select>
            <?php }elseif($this->session->userdata('jabatan') == 'Supervisor Pely Kas') {  ?>
            <select name="jabatan" class="form-control">
                <option value="Teller">Teller</option>
                <option value="TKK">TKK</option>
                <option value="Kliring">Kliring</option>
                <option value="Payment Point">Payment Point</option>
                <option value="Costumer Service">Costumer Service</option>
                <option value="UPN">UPN</option>
                <option value="DJS">DJS</option>
            </select>
            <?php }elseif($this->session->userdata('jabatan') == 'Supervisor Adm Unit') {  ?>
            <select name="jabatan" class="form-control">
                <option value="PAU">PAU</option>
                <option value="PRU">PRU</option>
                <option value="Petugas Cadangan">Petugas Cadangan</option>
                <option value="Bank Unit">Bank Unit</option>
            </select>
            <?php } ?>
        </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Umur :</label>
                                                <div class="col-lg-9">
                                                    <input type="number" name="umur" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Alamat :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="alamat" class="form-control"  required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Nomor HP :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="no_hp" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Tanggal Masuk :</label>
                                                <div class="col-lg-9">
                                                    <div class="input-group date">
                                                        <input id="date_added" name="tanggal_masuk" placeholder="YYYY-MM-DD" type="text" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                                                    <input type="text" name="sma" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S1 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S2 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">S3 :</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="s3" class="form-control">
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