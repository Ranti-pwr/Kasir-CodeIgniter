<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_users() {
        return $this->db->order_by('nama', 'asc')->get('user')->result_array();
    }

    public function add_user($data) {
        $data = [
			'username' 	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'nama'  	=> htmlspecialchars($this->input->post('name')),
			'level'		=> $this->input->post('level'),
		];
        return $this->db->insert('user', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('user', ['id_user' => $id]);
    }

    public function edit_user($data) {
        $data['nama'] = htmlspecialchars($this->input->post('name'));
		$data['level'] = $this->input->post('level');
        return $this->db->update('user', $data, ['id_user' => $this->input->post('id_user')]);
    }

    public function is_unique_username($username) {
        return $this->db->where('username', $username)->count_all_results('user') == 0;
    }

    public function validation_rules() {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|min_length[4]|max_length[15]',
                'errors' => ['required' => 'Field Name Kosong']
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[4]|max_length[15]|is_unique[user.username]',
                'errors' => ['required' => 'Field Username Kosong']
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[4]|max_length[15]',
                'errors' => ['required' => 'Field Password Kosong']
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required',
                'errors' => ['required' => 'Field Level Kosong']
            ]
        ];
    }
}
