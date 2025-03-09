            <?php 
                function skala_penilaian($nilai, $target_item, $kategori) {
                    $persentase_nilai = ($nilai / $target_item) * 100;

                    switch ($kategori) {
                        case 1:
                            if($persentase_nilai > 120) {
                                return 5;
                            }elseif($persentase_nilai >= 111 && $persentase_nilai <= 120) {
                                return 4;
                            }elseif($persentase_nilai >= 91 && $persentase_nilai <= 110) {
                                return 3;
                            }elseif($persentase_nilai >= 80 && $persentase_nilai <= 90) {
                                return 2;
                            }elseif($persentase_nilai < 80) {
                                return 1;
                            }
                            break;
                        case 2:
                            if($persentase_nilai < 80) {
                                return 5;
                            }elseif($persentase_nilai >= 80 && $persentase_nilai <= 90) {
                                return 4;
                            }elseif($persentase_nilai >= 91 && $persentase_nilai <= 110) {
                                return 3;
                            }elseif($persentase_nilai >= 111 && $persentase_nilai <= 120) {
                                return 2;
                            }elseif($persentase_nilai > 120) {
                                return 1;
                            }
                            break;

                        case 3:
                            if($persentase_nilai == 100) {
                                return 3;
                            }elseif($persentase_nilai == 0) {
                                return 0;
                            }else{
                                return 99999;
                            }
                            break;
                        default:
                            return 99999;
                            break;
                    }
                }

                function kualitas_penilaian_akhir($nilai_kpi) {
                    if($nilai_kpi >= 4.6 && $nilai_kpi <= 5) {
                        return 'Istimewa';
                    }elseif($nilai_kpi >= 3.6 && $nilai_kpi <= 4.59) {
                        return 'Sangat Baik';
                    }elseif($nilai_kpi >= 2.8 && $nilai_kpi <= 3.59) {
                        return 'Baik';
                    }elseif($nilai_kpi >= 2.4 && $nilai_kpi <= 2.79) {
                        return 'Cukup Baik';
                    }elseif($nilai_kpi < 2.4) {
                        return 'Tidak Baik';
                    }
                }

                function warna_skala($nilai_kpi){
                    if($nilai_kpi >= 4.6 && $nilai_kpi <= 5) {
                        return '#40ff00';
                    }elseif($nilai_kpi >= 3.6 && $nilai_kpi <= 4.59) {
                        return '#ffff00';
                    }elseif($nilai_kpi >= 2.8 && $nilai_kpi <= 3.59) {
                        return '#ffbf00';
                    }elseif($nilai_kpi >= 2.4 && $nilai_kpi <= 2.79) {
                        return '#ff8000';
                    }elseif($nilai_kpi < 2.4) {
                        return '#ff0000';
                    }
                }
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <!-- <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_prodi/tambah_prodi')?>'"><i class="fa fa-plus"></i> Tambah Nilai Realisasi</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> (Divisi Bisnis Mikro)</h5>
                            </div>
                            <div class="ibox-content">
                            <?php
                                // echo '<pre>';
                                // echo '<pre>'.print_r($nilai_realisasi, 1);
                                // echo '</pre><br>';
                                $nilai_kpi = 0;

                                foreach($nilai_realisasi as $key => $n) {
                                    // echo skala_penilaian($n['nilai'], $n['target_item'], $n['kategori']) * ($n['bobot_item'] / 100);
                                    $nilai_kpi += skala_penilaian($n['nilai'], $n['target_item'], $n['kategori']) * ($n['bobot_item'] / 100);
                                    // echo '<br>';
                                }
                                /* echo '<br>';
                                echo $nilai_kpi;
                                echo '<br>';
                                echo '<br>';
                                echo 'Kesimpulan bahwa pada indikator di KPI Individu, kinerja karyawan tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($nilai_kpi).'</strong>'; */
                            ?>
                            <table class="table table-bordered" align="center" style="background-color: white">
                                <thead>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>Nilai KPI</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2016</td>
                                        <td>
                                            <input type="text" value="<?php echo $nilai_kpi; ?>" class="dial m-r" data-fgColor="<?php echo warna_skala($nilai_kpi); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator di KPI Individu, kinerja karyawan tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($nilai_kpi).'</strong>'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2017</td>
                                        <td>
                                            <input type="text" value="4" class="dial m-r" data-fgColor="<?php echo warna_skala(4); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator di KPI Individu, kinerja karyawan tersebut dinyatakan <strong>'.kualitas_penilaian_akhir(4).'</strong>'; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>