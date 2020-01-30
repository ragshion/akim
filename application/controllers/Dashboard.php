<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['warga'] = count($this->db->get('warga')->result_array());
		$data['mutasi'] = count($this->db->get('mutasi')->result_array());
		$data['kartu_keluarga'] = count($this->db->get('kartu_keluarga')->result_array());
		$data['laki_laki'] = count($this->db->where('jenis_kelamin','laki-laki')->get('warga')->result_array());
		$data['perempuan'] = count($this->db->where('jenis_kelamin','perempuan')->get('warga')->result_array());
		$this->load->view('template/header');
		$this->load->view('dashboard/index',$data);
		$this->load->view('template/footer');
	}

	function chart_jk(){

		$resp = array(
			'laki_laki' => count($this->db->where('jenis_kelamin','laki-laki')->get('warga')->result_array()),
			'perempuan' => count($this->db->where('jenis_kelamin','perempuan')->get('warga')->result_array())
		);

		jsonku($resp);
	}

	function chart_usia(){
		$resp = $this->db->get('warga')->result_array();

		$balita = 0;
		$kanak = 0;
		$remaja = 0;
		$dewasa = 0;
		$lansia = 0;
		$kosong = 0;

		foreach ($resp as $value) {
			$umur = '';

			if ($value['tanggal_lahir'] == "" | $value['tanggal_lahir'] == '0000-00-00' | $value['tanggal_lahir'] == '1970-01-01') {
				$umur = '-';
			}else{
				$umur = dateDifference(date('Y-m-d'),$value['tanggal_lahir'],'%y');
			}

			if ($umur >= 0 && $umur < 5) {
				$balita += 1;
			}else if ($umur >= 5 && $umur <= 11) {
				$kanak += 1;
			}else if ($umur >= 12 && $umur <= 25) {
				$remaja += 1;
			}else if ($umur >= 26 && $umur <= 45) {
				$dewasa += 1;
			}else if ($umur >= 46) {
				$lansia += 1;
			}else if ($umur == '-') {
				// $blanks = $value['tanggal_lahir'];
				$kosong += 1;
			}
		}

		$data = array(
			'balita' => $balita,
			'kanak' => $kanak,
			'remaja' => $remaja,
			'dewasa' => $dewasa,
			'lansia' => $lansia,
			'kosong' => $kosong
		);

		jsonku($data);
	}

	function grafikperhari($bulan,$tahun){
		$list=array();
		$month = $bulan;
		$year = $tahun;

		for($d=1; $d<=31; $d++)
		{
		    $time=mktime(12, 0, 0, $month, $d, $year);          
		    if (date('m', $time)==$month)       
		        $list[]=date('Y-m-d-D', $time);
		}
		for ($x=0; $x < count($list); $x++) { 
			$hari = $x+1;
			$data[] = array(
				'warga' => $this->grafikHari('warga',$bulan,$hari,'tanggal_input')
			);
		}
		
		jsonku($data);
	}

	function grafikPerbulan(){
		for ($i=1; $i <= 12 ; $i++) { 
			$data[] = array(
				"warga" => count($this->db->where('month(tanggal_input)', $i)->get('warga')->result_array())
			);
		}

		jsonku($data);
	}

	function grafikHari($table,$bulan,$hari,$cek){
		$where = array('month('.$cek.')' => $bulan, 'day('.$cek.')' => $hari);
		return count($this->db->where($where)->get($table)->result_array());
	}

	function grafikBulan($table,$bulan,$cek){
		$where = array('month('.$cek.')' => $bulan);
		return count($this->db->where($where)->get($table)->result_array());
	}

}
