<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara extends CI_Controller {
	function __construct() {
		parent ::__construct();
		//$this->load->model('mymodel','',TRUE);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Tambah Rekap Suara';
		//$data['suara'] = $this->db->get('suara')->result_array();
		$this->load->view('suara');
	}

	public function SaveVote() {
		$this->form_validation->set_rules('nama_tps', 'Nama TPS', 'required|trim');
		$this->form_validation->set_rules('no1', 'Nama 1', 'required|trim');
		$this->form_validation->set_rules('no2', 'Nama 2', 'required|trim');
		$this->form_validation->set_rules('no3', 'Nama 3', 'required|trim');
		$this->form_validation->set_rules('total', 'Total', 'required|trim');
		$this->form_validation->set_rules('total_sah', 'Sah', 'required|trim');
		$this->form_validation->set_rules('total_tidaksah', 'Tidah Sah', 'required|trim');


		// $suara = $this->db->get('suara')->result_array();

		if($this->form_validation->run()) {
			 if ($this->_Unique1($this->input->post('no1'))) {
				if($this->_Unique2($this->input->post('no2'))) {
					if($this->_Unique3($this->input->post('no3'))) {
						$data = [
							'nama_tps' => htmlspecialchars($this->input->post('nama_tps', true)),
							'no1' 	   => htmlspecialchars($this->input->post('no1', true)),
							'no2'      => htmlspecialchars($this->input->post('no2', true)),
							'no3'      => htmlspecialchars($this->input->post('no3', true)),
							'total'	   => htmlspecialchars($this->input->post('total', true)),
							'total_sah'=> htmlspecialchars($this->input->post('total_sah', true)),
							'total_tidaksah' => htmlspecialchars($this->input->post('total_tidaksah', true)),
						];
						$this->db->insert('suara', $data);
						redirect('user/index/');
					} else {
						echo '<script>alert("Username No 3 telah tersedia")</script>';
					}
				} else {
					echo '<script>alert("Username No 2 telah tersedia")</script>';
				}
			 } else {
				echo '<script>alert("Username No 1 telah tersedia")</script>';
			 }
		} else {
			echo '<script>alert("Gagal Menyimpan, Isi Semua Field yang tersedia")</script>';
		}
	}

	private function _Unique1($no1){
		return $this->db->where('no1', $no1)->count_all_results('suara') == 0;
	}
	private function _Unique2($no2){
		return $this->db->where('no2', $no2)->count_all_results('suara') == 0;
	}
	private function _Unique3($no3){
		return $this->db->where('no3', $no3)->count_all_results('suara') == 0;
	}
}
