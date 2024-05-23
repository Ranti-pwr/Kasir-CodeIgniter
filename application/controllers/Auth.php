<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[15]');
		if($this->form_validation->run() == true){
			$this->_loginUser();
		} else {
			$data['title'] = 'Login Page';
			$this->load->view('login', $data); 
		}
	}

	private function _loginUser(){
		$username = htmlspecialchars($this->input->post('username'));
		// $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		// $user = $this->db->get_where('users', ['username' => $username])->row_array();

		// // jika usernya ada
		// if ($user) {
		// 	// cek passwordnya
		// 	if (password_verify($password, $user['password'])) {
		// 		$data = [
		// 			'id' => $user['id'],
		// 			'name' => $user['name'],
		// 			'email' => $user['email'],
		// 			'role_id' => $user['role_id']
		// 		];
		// 		$this->session->set_userdata($data); // simpan data ke session
		// 		redirect('dashboard'); // redirect ke halaman dashboard
		// 	}else{
		// 		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
		// 		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
		// 		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
		$password = md5($this->input->post('password'));
		$GetUser = $this->db->get_where('user', ['username' => $username])->row_array();

		if(empty($GetUser)){
			echo '<script>alert("Username tidak tersedia")</script>';
		} else {
			// jika usernya ada, cek passwordnya.
			if($password == $GetUser['password']) {  //true jika sama , false jika tidak sama
				$data = [
					'id_user' => $GetUser['id_user'],
					'nama' => $GetUser['nama'],
					'username' => $GetUser['username'],
					'level' => $GetUser['level']
				];
				$this->session->set_userdata($data); // simpan data ke session
				$this->_recent('LOGIN');
				// redirect('home');
				redirect('/home/index'); // redirect ke halaman dashboard class home
			} else {
				// echo 'Submitted Password: ' . $password;
				// echo 'Hashed Password from Database: ' . $GetUser['password'];
				echo '<script>alert("Password Salah")</script>'; 
			}
		}
	}

	private function _recent($status){
		$recent = [
			'username' => $this->session->userdata('username'),
			'device' => $this->input->user_agent(),
			'status' => $status,
		];
		$this->db->insert('recent', $recent);
	}


	public function logout(){
		$this->_recent('LOGOUT');
		$this->session->unset_userdata('username'); 
		$this->session->sess_destroy();
		redirect('/auth/index');
	}
}



