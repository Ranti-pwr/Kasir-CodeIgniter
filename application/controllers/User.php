<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'User';
        $data['user'] = $this->User_model->get_users();
        $this->teplat->load('temp', 'user', $data);
    }

    public function add_user() {
        $this->form_validation->set_rules($this->User_model->validation_rules());

        if ($this->form_validation->run()) {
            if ($this->User_model->is_unique_username($this->input->post('username'))) {
                $this->User_model->add_user($this->input->post());
                redirect('/user/index');
            } else {
                echo '<script>alert("Username Sudah Terdaftar")</script>';
            }
        } else {
            echo '<script>alert("Gagal Menyimpan, Isi Semua Field min 4 huruf !!")</script>';
        }
    }

    public function delete_user_by_id($id) {
        $this->User_model->delete_user($id);
        redirect('/user/index');
    }

    public function edit_user() {
		$data['nama'] = htmlspecialchars($this->input->post('name'));
		$data['level'] = $this->input->post('level');
		$this->db->update('user', $data, ['id_user' => $this->input->post('id_user')]);
		redirect('/user/index');
        // $this->form_validation->set_rules($this->User_model->validation_rules());

        // if ($this->form_validation->run()) {
        //     $this->User_model->edit_user($this->input->post());
        //     redirect('/user/index');
        // } else {
        //     echo '<script>alert("Gagal Menyimpan, Isi Semua Field min 4 huruf !!")</script>';
        // }
    }
}
