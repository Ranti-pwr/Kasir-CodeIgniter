<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recent extends CI_Controller {
	// function __construct() {
	// 	parent ::__construct();
		
	// }

	public function index()
	{
			$data['title'] = 'Riwayat Login';
			$data['recent'] = $this->db->from('recent')->order_by('username', 'asc')->get()->result_array();
			$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->result_array();
		$this->teplat->load('temp', 'recent', $data);
	}

	private function get_brand_name($user_agent) {
		// Contoh pengambilan nama merek dari User-Agent
		if (strpos($user_agent, 'Windows NT 10.0') !== false) {
			return 'Windows 10';
		} elseif (strpos($user_agent, 'Windows NT 6.3') !== false) {
			return 'Windows 8.1';
		} elseif (strpos($user_agent, 'Windows NT 6.2') !== false) {
			return 'Windows 8';
		}
		// Dan seterusnya, sesuaikan dengan aturan untuk menentukan nama merek berdasarkan User-Agent
		// Jika tidak ditemukan, kembalikan nilai default
		return 'Unknown';
	}
	
}

