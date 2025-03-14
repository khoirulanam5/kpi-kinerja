<?php
// Mengubah format tanggal menjadi "Senin, 27 November 2024"
function do_formal_date($date='',$delimiter = '',$is_day=false)
	{
		if (empty($date)) 
		{
			$date = date('d M Y');
		}

		if (!empty($date)) 
		{
			$day = '';
			if ($is_day) 
			{
				$days = ['Saturday' => 'Sabtu',
						 'Sunday' 	=> 'Minggu', 
						 'Monday' 	=> 'Senin', 
						 'Tuesday'  => 'Selasa', 
						 'Wednesday'=> 'Rabu', 
						 'Thursday' => 'Kamis',
						 'Friday' 	=> 'Jum\'at'];
				$day = $days[date('l', strtotime($date))].', ';
			}
			$months =['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
			$d = date('d', strtotime($date));
			$m = date('m', strtotime($date));
			$y = date('Y', strtotime($date));

			$delimiter = !empty($delimiter) ? $delimiter : ' ';
			return $day.$d.$delimiter.$months[intval($m)].$delimiter.$y;
		}
	}

    function get_bulan($date = '') {
        if (empty($date)) {
            $date = date('Y-m-d');
        }

        $months = [
            '', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $m = date('m', strtotime($date));
        return $months[intval($m)];
    }
// Contoh penggunaan
// echo formatTanggalIndonesia($val->tgl_kirim);
function rp($var = null)
{
    $hasil_rupiah = "Rp " . number_format($var,0,',','.');
    return $hasil_rupiah;
}