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

                // print_r($nilai_realisasi_dalam);
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?> (<?php echo $this->session->userdata('nama').' - '.$this->session->userdata('nama_divisi'); ?>)</h5>
                            </div>
                            <div class="ibox-content">
                            <?php
                                if($tahun_realisasi != NULL) {
                                $temp = 0;

                                foreach ($tahun_realisasi as $key1 => $t) {
                                    foreach($nilai_realisasi_dalam as $key2 => $n) {
                                        if($t['bulan'] == $n['bulan']) {
                                            $temp += skala_penilaian($n['nilai'], $n['target_item'], $n['kategori']) * ($n['bobot_item'] / 100);
                                        }
                                    }
                                    $kpi_dalam[$key1]['nilai_kpi'] = $temp;
                                    $kpi_dalam[$key1]['bulan'] = $t['bulan'];
                                    $kpi_dalam[$key1]['tahun'] = $t['tahun'];
                                    $temp = 0;

                                    foreach($nilai_realisasi_luar as $key2 => $n) {
                                        if($t['bulan'] == $n['bulan']) {
                                            $temp += skala_penilaian($n['nilai'], $n['target_item'], $n['kategori']) * ($n['bobot_item'] / 100);
                                        }
                                    }

                                    $kpi_luar[$key1]['nilai_kpi'] = $temp;
                                    $kpi_luar[$key1]['bulan'] = get_bulan($t['bulan']);
                                    $kpi_luar[$key1]['tahun'] = $t['tahun'];

                                    if($this->session->userdata('id_divisi') == 3) {
                                        $hasil_kpi[$key1]['nilai_kpi'] = $kpi_dalam[$key1]['nilai_kpi'];
                                    }else {
                                        $hasil_kpi[$key1]['nilai_kpi'] = ($kpi_dalam[$key1]['nilai_kpi'] + $kpi_luar[$key1]['nilai_kpi']) / 2;
                                    }
                                    $temp = 0;
                                }

                                // print_r($kpi);
                            ?>
                            <table class="table table-bordered" align="center" style="background-color: white">
                                <thead>
                                    <tr>
                                        <td>Tahun</td>
                                        <td>Bulan</td>
                                        <td>Tipe Scorecard</td>
                                        <td>Nilai KPI</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $jumlah_kpi = count($kpi_dalam);
                                        for ($i = 0; $i < $jumlah_kpi; $i++) {
                                        if($this->session->userdata('id_divisi') != 3) {  
                                    ?>
                                    <tr>
                                        <td rowspan="3"><?php echo $kpi_dalam[$i]['tahun']; ?></td>
                                        <td rowspan="3"><?php echo get_bulan($kpi_dalam[$i]['bulan']); ?></td>
                                        <td>Scorecard Dalam</td>
                                        <td>
                                            <input type="text" value="<?php echo $kpi_dalam[$i]['nilai_kpi']; ?>" class="dial m-r" data-fgColor="<?php echo warna_skala($kpi_dalam[$i]['nilai_kpi']); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator di KPI Individu di dalam Scorecard Unit, kinerja pegawai tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($kpi_dalam[$i]['nilai_kpi']).'</strong>.'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Scorecard Luar</td>
                                        <td>
                                            <input type="text" value="<?php echo $kpi_luar[$i]['nilai_kpi']; ?>" class="dial m-r" data-fgColor="<?php echo warna_skala($kpi_luar[$i]['nilai_kpi']); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator di KPI Individu di luar Scorecard Unit, kinerja pegawai tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($kpi_luar[$i]['nilai_kpi']).'</strong>.'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hasil Akhir</td>
                                        <td>
                                            <input type="text" value="<?php echo $hasil_kpi[$i]['nilai_kpi']; ?>" class="dial m-r" data-fgColor="<?php echo warna_skala($hasil_kpi[$i]['nilai_kpi']); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator hasil akhir di KPI, kinerja karyawan tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($hasil_kpi[$i]['nilai_kpi']).'</strong>'; ?>
                                        </td>
                                    </tr>
                                    <?php }else{ ?> 
                                    <tr>
                                        <td><?php echo get_bulan($kpi_dalam[$i]['bulan']); ?></td>
                                        <td>Scorecard Dalam</td>
                                        <td>
                                            <input type="text" value="<?php echo $kpi_dalam[$i]['nilai_kpi']; ?>" class="dial m-r" data-fgColor="<?php echo warna_skala($kpi_dalam[$i]['nilai_kpi']); ?>" data-width="150" data-height="150" data-angleOffset="270" data-angleArc="180" data-min="0" data-max="5" readonly/>
                                        </td>
                                        <td>
                                            <?php echo 'Kesimpulan bahwa pada indikator hasil akhir di KPI, kinerja karyawan tersebut dinyatakan <strong>'.kualitas_penilaian_akhir($hasil_kpi[$i]['nilai_kpi']).'</strong>'; ?>
                                        </td>
                                    </tr>
                                    <?php }}}else{ echo '<div class="alert alert-info text-center">Nilai Realisasi Belum Diinputkan!</div>';} ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>