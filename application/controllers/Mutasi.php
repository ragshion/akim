<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['data'] = $this->db->select('pekerjaan.nama as nama_pekerjaan, mutasi.*')
			->from('mutasi')
			->join('pekerjaan','pekerjaan.id=mutasi.pekerjaan')
			->get()->result_array();
		$this->load->view('template/header');
		$this->load->view('mutasi/index',$data);
		$this->load->view('template/footer');
	}

	function detail($id){
		$data = $this->db->where('id',$id)->get('warga')->row_array();
		$data = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_prov, pekerjaan.nama as nama_pekerjaan, warga.*')
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

	function tambah($id){
		$data['data'] = $this->detail($id);
		$data['data']['tanggal_asli'] = date('d-m-Y', strtotime($data['data']['tanggal_asli']));
		$data['kabupaten'] = $this->db->get('regencies')->result_array();
		$data['kecamatan'] = $this->db->where('regency_id',$data['data']['kabupaten_kota'])->get('districts')->result_array();
		$data['desa_kelurahan'] = $this->db->where('district_id',$data['data']['kecamatan'])->get('villages')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

		$this->load->view('template/header');
		$this->load->view('mutasi/tambah',$data);
		$this->load->view('template/footer');
	}

	function detail_edit($id){
		$data = $this->db->where('id',$id)->get('mutasi')->row_array();
		$data = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_prov, pekerjaan.nama as nama_pekerjaan, mutasi.*')
			->from('mutasi')
			->join('villages','villages.id=mutasi.desa_kelurahan')
			->join('districts','districts.id=mutasi.kecamatan')
			->join('regencies','regencies.id=mutasi.kabupaten_kota')
			->join('pekerjaan','pekerjaan.id=mutasi.pekerjaan')
			->where('mutasi.id',$id)->get()->row_array();
		
		$data['tanggal_asli'] = $data['tanggal_lahir'];
		$data['tanggal_lahir'] = tanggal_indo($data['tanggal_lahir']);
		return $data;
	}

	function edit($id){
		$data['data'] = $this->detail_edit($id);
		$data['data']['tanggal_mutasi'] = date('d-m-Y', strtotime($data['data']['tanggal_mutasi']));
		$data['kabupaten'] = $this->db->get('regencies')->result_array();
		$data['kecamatan'] = $this->db->where('regency_id',$data['data']['kabupaten_kota'])->get('districts')->result_array();
		$data['desa_kelurahan'] = $this->db->where('district_id',$data['data']['kecamatan'])->get('villages')->result_array();
		$data['pekerjaan'] = $this->db->get('pekerjaan')->result_array();

		$this->load->view('template/header');
		$this->load->view('mutasi/edit',$data);
		$this->load->view('template/footer');
	}

	function update(){
		$id = $this->input->post('id');
		$asli = $this->db->where('id',$id)->get('mutasi')->row_array();
		$data = $this->input->post();
		$asli['alamat_mutasi'] = $data['alamat_mutasi'];
		$asli['rt_mutasi'] = $data['rt_mutasi'];
		$asli['rw_mutasi'] = $data['rw_mutasi'];
		$asli['kabupaten_mutasi'] = $data['kabupaten_mutasi'];
		$asli['kecamatan_mutasi'] = $data['kecamatan_mutasi'];
		$asli['desa_mutasi'] = $data['desa_mutasi'];
		$asli['tanggal_mutasi'] = date('Y-m-d', strtotime($data['tanggal_mutasi']));

		jsonku($asli);

		if ($this->db->where('id',$id)->update('mutasi',$asli)) {
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-secondary', 
				title: 'Success',
				autohide: true,
        		delay: 1500,
				subtitle: 'Berhasil!',
				body: 'Data Mutasi Berhasil Diperbarui'
			  })"
			);
		}else{
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-error', 
				title: 'Error',
				autohide: true,
        		delay: 1500,
				subtitle: 'Gagal Menyimpan!',
				body: 'Data Mutasi Gagal Disimpan'
			  })"
			);
		}

		redirect('mutasi');
	}

	function simpan(){
		$id = $this->input->post('id');
		$asli = $this->db->where('id',$id)->get('warga')->row_array();
		$data = $this->input->post();
		$asli['alamat_mutasi'] = $data['alamat_mutasi'];
		$asli['rt_mutasi'] = $data['rt_mutasi'];
		$asli['rw_mutasi'] = $data['rw_mutasi'];
		$asli['kabupaten_mutasi'] = $data['kabupaten_mutasi'];
		$asli['kecamatan_mutasi'] = $data['kecamatan_mutasi'];
		$asli['desa_mutasi'] = $data['desa_mutasi'];
		$asli['tanggal_mutasi'] = date('Y-m-d', strtotime($data['tanggal_mutasi']));
		unset($asli['in_kk']);

		if ($this->db->insert('mutasi',$asli)) {
			$this->db->where('id',$id)->delete('warga');
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-info', 
				title: 'Success',
				autohide: true,
        		delay: 1500,
				subtitle: 'Berhasil!',
				body: 'Data Mutasi Berhasil Disimpan'
			  })"
			);
		}else{
			$this->session->set_flashdata("alert","$(document).Toasts('create', {
				class: 'bg-error', 
				title: 'Error',
				autohide: true,
        		delay: 1500,
				subtitle: 'Gagal Menyimpan!',
				body: 'Data Mutasi Gagal Disimpan'
			  })"
			);
		}

		redirect('mutasi');
	}

	function hapus($id){
		$this->db->where('id',$id)->delete('mutasi');
		$this->session->set_flashdata("alert","$(document).Toasts('create', {
			class: 'bg-success', 
			title: 'Success',
			autohide: true,
    		delay: 1500,
			subtitle: 'Berhasil Hapus!',
			body: 'Data Warga Mutasi Tempat Tinggal Berhasil Dihapus!'
		  })"
		);
		redirect('mutasi');
	}

	function cetak(){
		$data['data'] = $this->db->select('villages.name as nama_desa, districts.name as nama_kec, regencies.name as nama_kota, pekerjaan.nama as nama_pekerjaan, mutasi.*')
			->from('mutasi')
			->join('villages','villages.id=mutasi.desa_mutasi')
			->join('districts','districts.id=mutasi.kecamatan_mutasi')
			->join('regencies','regencies.id=mutasi.kabupaten_mutasi')
			->join('pekerjaan','pekerjaan.id=mutasi.pekerjaan')
			->get()->result_array();

		for ($i=0; $i < count($data['data']); $i++) { 
			$data['data'][$i]['tanggal_lahir'] = tanggal_indo($data['data'][$i]['tanggal_lahir']);
		}

		$this->load->library('pdf');

		$this->pdf->setPaper('A4','landscape');
		$this->pdf->filename = "laporan-mutasi.pdf";
		$this->pdf->load_view('laporan_mutasi', $data);
	}

}
