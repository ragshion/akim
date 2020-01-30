<?php

	function jsonku($resp){
		header('Content-Type: application/json');
		echo json_encode($resp, JSON_PRETTY_PRINT);
	}
	
	function tanggal_indo($tanggal, $cetak_hari = false){
	  $hari = array ( 1 =>    'Senin',
	        'Selasa',
	        'Rabu',
	        'Kamis',
	        'Jumat',
	        'Sabtu',
	        'Minggu'
	      );
	      
	  $bulan = array (1 =>   'Januari',
	        'Februari',
	        'Maret',
	        'April',
	        'Mei',
	        'Juni',
	        'Juli',
	        'Agustus',
	        'September',
	        'Oktober',
	        'November',
	        'Desember'
	      );
	  $split    = explode('-', $tanggal);
	  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	  
	  if ($cetak_hari) {
	    $num = date('N', strtotime($tanggal));
	    return $hari[$num] . ', ' . $tgl_indo;
	  }
	  return $tgl_indo;
	}

	function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ){
	    $datetime1 = date_create($date_2);
	    $datetime2 = date_create($date_1);
	    $interval = date_diff($datetime1, $datetime2);
	    return $interval->format($differenceFormat);
	}

 ?>
