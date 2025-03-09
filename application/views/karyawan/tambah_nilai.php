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
                                    foreach ($bulan_realisasi as $t) {
                                        if($t['bulan'] == strftime('%B')){
                                            $found = TRUE;
                                        }
                                    }

                                    if($found == FALSE) { 
                                ?>
                                <div class="table-responsive">
                                <form class="m-t" role="form" action="<?php echo site_url('nilai_realisasi/tambah_nilai_form'); ?>" method="post">
    <div class="table-responsive">
        <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Item</td>
                    <td>Indikator</td>
                    <td>Nilai</td>
                </tr>
            </thead>
            <tbody>
            <?php if ($nilai_realisasi != NULL) foreach ($nilai_realisasi as $key => $n) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $n['nama_item']; ?></td>
                    <td><?php echo $n['indikator']; ?></td>
                    <td>
                        <input type="hidden" name="id_item_kpi[]" value="<?php echo $n['id_item_kpi']; ?>">
                        <?php if ($n['satuan_target'] == 'persen') { ?>
                            <div class="input-group">
                                <input type="number" name="nilai[]" class="form-control" min="0" step="0.1" required>
                            </div>
                        <?php } else { ?>
                            <div class="input-group">
                                <input type="number" name="nilai[]" class="form-control" required>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Input Bulan (Hanya 1 kali di bawah tabel) -->
    <div class="form-group">
        <label for="bulan">Pilih Bulan:</label>
        <select name="bulan" id="bulan" class="form-control" required>
            <option value="" disabled selected>Pilih Bulan</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
    </div>

    <div class="text-right">
        <!-- <button type="reset" class="btn btn-w-m btn-warning">Reset</button> -->
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