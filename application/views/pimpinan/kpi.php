            <?php 
                function satuan($id_item_kpi) {
                    if(($id_item_kpi >= 9 && $id_item_kpi <= 13) || ($id_item_kpi >= 22 && $id_item_kpi <= 26)) {
                        return 0;
                    }else{
                        return 1;
                    }
                }
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <?php if($item_kpi_dalam != NULL) { ?>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> Scorecard Dalam</h5>
                                <div class="text-right">
                                <button class="btn btn-info" onclick="location.href='<?php echo site_url('kpi/add_item_kpi/')?>'" type="button"><i class="fa fa-add"></i> Tambah</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-info-circle"></i> Catatan</button>
                                <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-text="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-text="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Catatan KPI</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li>Gunakan Konstanta (C) untuk menghindari Nilai Ekstrim dari fluktuasi Realisasi (R) yang ekstrim.</li>
                                                <li>Untuk Target (T) dan Realisasi (R) Max = 100%.</li>
                                                <li>Gunakan Konstanta (C) untuk menghindari Nilai Ekstrim dari fluktuasi Realisasi (R) yang ekstrim.</li>
                                                <li>Ada kemungkinan nilai Realisasi (R) mempunyai besaran ekstrim. Target (T) dan atau Realisasi (R) bisa negatif (-).</li>
                                            </ul>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <?php if ($this->session->flashdata('pesan')): ?>
                                <div class="">
                                    <?= $this->session->flashdata('pesan'); ?>
                                </div>
                                <?php $this->session->unset_userdata('pesan'); ?> <!-- Hapus Flashdata -->
                            <?php endif; ?>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Item KPI</td>
                                            <td>Indikator</td>
                                            <td>Bobot Item</td>
                                            <td width="150px">Target Item</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total_bobot = 0;
                                            foreach($item_kpi_dalam as $key => $value) { 
                                                $total_bobot += $value['bobot_item'];
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_item']; ?></td>
                                            <td><?php echo $value['indikator']; ?></td>
                                            <td><?php echo $value['bobot_item']; ?></td>
                                            <td><?php echo $value['target_item']; ?></td>
                                            <td>
                                                <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('kpi/edit_item_kpi/'.$value['id_item_kpi'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger dim" onclick="location.href='<?php echo site_url('kpi/delete/'.$value['id_item_kpi'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                <?php echo $total_bobot != 100 ? '<div class="alert alert-warning text-center">Total tobot tidak 100%!</div>' : ''; ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($item_kpi_luar != NULL) { ?>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> Scorecard Luar</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Nama Item KPI</td>
                                            <td>Indikator</td>
                                            <td>Bobot Item</td>
                                            <td width="150px">Target Item</td>
                                            <td width="200px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total_bobot = 0;
                                            foreach($item_kpi_luar as $key => $value) { 
                                            $total_bobot += $value['bobot_item'];
                                        ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_item']; ?></td>
                                            <td><?php echo $value['indikator']; ?></td>
                                            <td><?php echo $value['bobot_item']; ?></td>
                                            <td><?php echo $value['target_item']; ?></td>
                                            <td>
                                                <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('kpi/edit_item_kpi/'.$value['id_item_kpi'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger dim" onclick="location.href='<?php echo site_url('kpi/delete/'.$value['id_item_kpi'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                                <?php echo $total_bobot != 100 ? '<div class="alert alert-warning text-center">Total tobot tidak 100%!</div>' : ''; ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
