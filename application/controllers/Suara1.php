<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara1 extends CI_Controller {
	function __construct() {
		parent ::__construct();
		//$this->load->model('mymodel','',TRUE);
		$this->load->library('form_validation');
	}



	public function index() {
		$data['title'] = 'Input Data Suara';
		$this->load->view('suara');
	}

	public function SaveVote() {

		// $nama_tps = $this->input->post('nama_tps', true);
		$no1 	   = $this->input->post('no1', true);
		$no2      = $this->input->post('no2', true);
		$no3      = $this->input->post('no3', true);
		$total	   = $this->input->post('total', true);
		$total_sah = $this->input->post('total_sah', true);
		$total_tidaksah = $this->input->post('total_tidaksah', true);


		// $suara = $this->db->where('nama_tps8', $nama_tps)->count_all_results('suara_8') == 0;
			if(($total_sah + $total_tidaksah) != $total) {
				echo '<script>alert("salah a")</script>';
			} else {
				if( ($no1 + $no2 + $no3) != $total) {
					echo '<script>alert("salah b")</script>';
				} else {
					$data = [
						'nama_tps8' => $this->input->post('nama_tps', true),
						'suara_no1_8' 	   => $this->input->post('no1', true),
						'suara_no2_8'      => $this->input->post('no2', true),
						'suara_no3_8'      => $this->input->post('no3', true),
						'total_suara8'	   => $this->input->post('total', true),
						'total_suara_sah8'=> $this->input->post('total_sah', true),
						'total_suara_tidaksah8' => $this->input->post('total_tidaksah', true),
					];
					$this->db->insert('suara_8', $data);
					redirect('user/index/');
				}
			}

	}
	}

?>
