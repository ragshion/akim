<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['data'] = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kab, provinces.name as nama_prov, kartu_keluarga.*, warga.nama as kepala_keluarga')
			->from('kartu_keluarga')
			->join('villages','villages.id=kartu_keluarga.desa_kelurahan')
			->join('districts','districts.id=kartu_keluarga.kecamatan')
			->join('regencies','regencies.id=kartu_keluarga.kabupaten')
			->join('provinces','provinces.id=kartu_keluarga.provinsi')
			->join('warga','warga.id=kartu_keluarga.id_kepala','left')
			->get()->result_array();

		$this->load->view('template/header');
		$this->load->view('kartu_keluarga/index',$data);
		$this->load->view('template/footer');
	}

	public  function tambah(){
		$data['provinsi'] = $this->db->get('provinces')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();
		$data['kepala'] = $this->db->where('jenis_kelamin','laki-laki')->where('in_kk','0')->get('warga')->result_array();
		$data['istri'] = $this->db->where('in_kk','0')->where('jenis_kelamin','perempuan')->where('status_perkawinan','KAWIN')->get('warga')->result_array();
		$data['anak'] = $this->db->where('status_perkawinan','BELUM KAWIN')->where('in_kk','0')->get('warga')->result_array();

		$this->load->view('template/header');
		$this->load->view('kartu_keluarga/tambah',$data);
		$this->load->view('template/footer');
	}

	public function simpan(){
		$data = $this->input->post();
		$kk = $data;
		unset($kk['istri']);
		unset($kk['anak']);
		$kk['id_user'] = $this->session->userdata('id_user');
		$this->db->insert('kartu_keluarga',$kk);

		$kepala = array(
			'nomor_kk' => $data['nomor'],
			'id_warga' => $data['id_kepala'],
			'hub_keluarga' => 'Kepala Keluarga'
		);
		$this->db->insert('anggota_keluarga',$kepala);
		$this->db->where('id',$data['id_kepala'])->update('warga',array(
			'in_kk' => '1'
		));

		$istri = array(
			'nomor_kk' => $data['nomor'],
			'id_warga' => $data['istri'],
			'hub_keluarga' => 'Istri'
		);
		$this->db->insert('anggota_keluarga',$istri);
		$this->db->where('id',$data['istri'])->update('warga',array(
			'in_kk' => '1'
		));


		foreach ($data['anak'] as $row) {
			$anak = array(
				'nomor_kk'  => $data['nomor'],
				'id_warga' => $row,
				'hub_keluarga' => 'Anak'
			);
			
			$this->db->insert('anggota_keluarga',$anak);
			$this->db->where('id',$row)->update('warga',array(
				'in_kk' => '1'
			));
		}

		$this->session->set_flashdata("alert","$(document).Toasts('create', {
			class: 'bg-success', 
			title: 'Success',
			autohide: true,
    		delay: 1500,
			subtitle: 'Berhasil!',
			body: 'Data Kartu Keluarga Berhasil Disimpan'
		  })"
		);

		redirect('kartu_keluarga');
	}



	function edit($id){
		$data['data'] = $this->detail($id);
		$data['data']['tanggal_asli'] = date('d-m-Y', strtotime($data['data']['tanggal_asli']));
		$data['kabupaten'] = $this->db->get('regencies')->result_array();
		$data['kecamatan'] = $this->db->where('regency_id',$data['data']['kabupaten_kota'])->get('districts')->result_array();
		$data['desa_kelurahan'] = $this->db->where('district_id',$data['data']['kecamatan'])->get('villages')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

		$this->load->view('template/header');
		$this->load->view('kartu_keluarga/edit',$data);
		$this->load->view('template/footer');
		
	}

	function detail($id){
		$data = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kab, provinces.name as nama_prov, warga.nama as kepala, kartu_keluarga.*')
			->from('kartu_keluarga')
			->join('villages','villages.id=kartu_keluarga.desa_kelurahan')
			->join('districts','districts.id=kartu_keluarga.kecamatan')
			->join('regencies','regencies.id=kartu_keluarga.kabupaten')
			->join('provinces','provinces.id=kartu_keluarga.provinsi')
			->join('warga','warga.id=kartu_keluarga.id_kepala','left')
			->where('kartu_keluarga.id',$id)->get()->row_array();
		return $data;
	}

	function detail_json(){
		$data = $this->detail($this->input->post('id'));
		$data['keluarga'] = $this->db->select('warga.nama, anggota_keluarga.*')
			->from('anggota_keluarga')
			->join('warga','warga.id=anggota_keluarga.id_warga')
			->where('nomor_kk',$data['nomor'])
			->order_by('jabatan','asc')
			->get()->result_array();
		jsonku($data);
	}

	function cetak(){
		$data['data'] = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kab, provinces.name as nama_prov, kartu_keluarga.*, warga.nama as kepala_keluarga')
			->from('kartu_keluarga')
			->join('villages','villages.id=kartu_keluarga.desa_kelurahan')
			->join('districts','districts.id=kartu_keluarga.kecamatan')
			->join('regencies','regencies.id=kartu_keluarga.kabupaten')
			->join('provinces','provinces.id=kartu_keluarga.provinsi')
			->join('warga','warga.id=kartu_keluarga.id_kepala','left')
			->get()->result_array();

		$this->load->library('pdf');

		$this->pdf->setPaper('A4','landscape');
		$this->pdf->filename = "laporan-kk.pdf";
		$this->pdf->load_view('laporan_kk', $data);
	}

	function hapus($id){
		$kk = $this->db->where('id',$id)->get('kartu_keluarga')->row_array();
		$anggota = $this->db->where('nomor_kk',$kk['nomor'])->get('anggota_keluarga')->result_array();
		foreach ($anggota as $row) {
			$this->db->where('id',$row['id_warga'])->update('warga',array(
				'in_kk' => '0'
			));
		}
		$this->db->where('nomor_kk',$kk['nomor'])->delete('anggota_keluarga');
		$this->db->where('id',$id)->delete('kartu_keluarga');

		$this->session->set_flashdata("alert","$(document).Toasts('create', {
			class: 'bg-danger', 
			title: 'Success',
			autohide: true,
    		delay: 1500,
			subtitle: 'Berhasil Hapus!',
			body: 'Data Kartu Keluarga Berhasil Dihapus!'
		  })"
		);
		redirect('kartu_keluarga');
	}

}
