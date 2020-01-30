<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['data'] = $this->db->select('pekerjaan.nama as nama_pekerjaan, warga.*')
			->from('warga')
			->join('pekerjaan','pekerjaan.id=warga.pekerjaan')
			->get()->result_array();
		$this->load->view('template/header');
		$this->load->view('warga/index',$data);
		$this->load->view('template/footer');
	}

	public  function tambah(){
		$data['kabupaten'] = $this->db->get('regencies')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

		$this->load->view('template/header');
		$this->load->view('warga/tambah',$data);
		$this->load->view('template/footer');
	}

	function load_kabupaten(){
		$id = $this->input->post('id');
		$kabupaten = $this->db->where('province_id',$id)->get('regencies')->result_array();
		jsonku($kabupaten);
	}

	function load_kecamatan(){
		$id = $this->input->post('id');
		$kecamatan = $this->db->where('regency_id',$id)->get('districts')->result_array();
		jsonku($kecamatan);
	}

	function load_desa(){
		$id = $this->input->post('id');
		$desa = $this->db->where('district_id',$id)->get('villages')->result_array();
		jsonku($desa);
	}

	function simpan(){
		$data = $this->input->post();
		$data['tanggal_lahir'] = date('Y-m-d', strtotime($data['tanggal_lahir']));
		$data['id_user'] = $this->session->userdata('id_user');
		if ($this->db->insert('warga',$data)) {
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-info', 
				title: 'Success',
				autohide: true,
        		delay: 1500,
				subtitle: 'Berhasil!',
				body: 'Data Warga Berhasil Disimpan'
			  })"
			);
		}else{
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-error', 
				title: 'Error',
				autohide: true,
        		delay: 1500,
				subtitle: 'Gagal Menyimpan!',
				body: 'Data Warga Gagal Disimpan'
			  })"
			);
		}

		redirect('warga');
	}

	function edit($id){
		$data['data'] = $this->detail($id);
		$data['data']['tanggal_asli'] = date('d-m-Y', strtotime($data['data']['tanggal_asli']));
		$data['kabupaten'] = $this->db->get('regencies')->result_array();
		$data['kecamatan'] = $this->db->where('regency_id',$data['data']['kabupaten_kota'])->get('districts')->result_array();
		$data['desa_kelurahan'] = $this->db->where('district_id',$data['data']['kecamatan'])->get('villages')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

		$this->load->view('template/header');
		$this->load->view('warga/edit',$data);
		$this->load->view('template/footer');
	}

	function detail($id){
		// $data = $this->db->where('id',$id)->get('warga')->row_array();
		$data = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kab, pekerjaan.nama as nama_pekerjaan, warga.*')
			->from('warga')
			->join('villages','villages.id=warga.desa_kelurahan')
			->join('districts','districts.id=warga.kecamatan')
			->join('regencies','regencies.id=warga.kabupaten_kota')
			->join('pekerjaan','pekerjaan.id=warga.pekerjaan')
			->where('warga.id',$id)->get()->row_array();
		
		$data['tanggal_asli'] = $data['tanggal_lahir'];
		$data['tanggal_lahir'] = tanggal_indo($data['tanggal_lahir']);
		return $data;
	}

	function detail_json(){
		$data = $this->detail($this->input->post('id'));
		$nomor_kk = $this->db->where('id_warga',$this->input->post('id'))->get('anggota_keluarga')->row_array();
		$data['keluarga'] = $this->db->select('warga.nama, anggota_keluarga.*')
			->from('anggota_keluarga')
			->join('warga','warga.id=anggota_keluarga.id_warga')
			->where('nomor_kk',$nomor_kk['nomor_kk'])
			->order_by('jabatan','asc')
			->get()->result_array();
		jsonku($data);
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('warga');
		$this->session->set_flashdata("alert","$(document).Toasts('create', {
			class: 'bg-secondary', 
			title: 'Success',
			autohide: true,
    		delay: 1500,
			subtitle: 'Berhasil Hapus!',
			body: 'Data Warga Berhasil Dihapus!'
		  })"
		);
		redirect('warga');
	}

	function update(){
		$data = $this->input->post();
		$data['tanggal_lahir'] = date('Y-m-d', strtotime($data['tanggal_lahir']));
		if ($this->db->where('id',$data['id'])->update('warga',$data)) {
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-success', 
				title: 'Success',
				autohide: true,
        		delay: 1500,
				subtitle: 'Update Berhasil!',
				body: 'Data Warga Berhasil Diupdate'
			  })"
			);
		}else{
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-error', 
				title: 'Error',
				autohide: true,
        		delay: 1500,
				subtitle: 'Gagal Menyimpan!',
				body: 'Data Warga Gagal Disimpan'
			  })"
			);
		}

		redirect('warga');
	}

	function cetak(){
		$data['data'] = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kota, pekerjaan.nama as nama_pekerjaan, warga.*')
			->from('warga')
			->join('villages','villages.id=warga.desa_kelurahan')
			->join('districts','districts.id=warga.kecamatan')
			->join('regencies','regencies.id=warga.kabupaten_kota')
			->join('pekerjaan','pekerjaan.id=warga.pekerjaan')
			->get()->result_array();

		for ($i=0; $i < count($data['data']); $i++) { 
			$data['data'][$i]['tanggal_lahir'] = tanggal_indo($data['data'][$i]['tanggal_lahir']);
		}

		$this->load->library('pdf');

		$this->pdf->setPaper('A4','landscape');
		$this->pdf->filename = "laporan-warga.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}

}
