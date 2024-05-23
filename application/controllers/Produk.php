<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Produk';
		$this->db->from('produk')->order_by('kode_produk', 'asc');
		$data['user'] = $this->db->get()->result_array();
		$this->teplat->load('temp', 'produk', $data);
	}

	public function add_produk() {
		$this->form_validation->set_rules('nama', 'Name Produk', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
	//	$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric');
		$this->form_validation->set_rules('stok', 'Stok', 'required|trim|integer');

		$this->db->from('produk')->where('kode_produk', $this->input->post('kode_produk'));
		$produk = $this->db->get()->result_array();
		
		if($this->form_validation->run() == false) {
			echo '<script>alert("Gagal Menyimpan data produk");</script>';
			// echo json_encode('Gagal Menyimpan data produk');
		} elseif ($produk <> null) {
			 echo '<script>alert("Data Produk telah tersedia");</script>';
			//echo json_encode('Data Produk telah tersedia');
		} else {
			// $kode_pro = $this->_get_code_produk();
			$config['upload_path'] = './upload/produk/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 3048; // 3MB
            $config['file_name'] = 'produk_' . time(); // Nama file disesuaikan dengan waktu upload
            $this->load->library('upload', $config);

			if(!$this->upload->do_upload('foto')) {
				$error = $this->upload->display_errors();
				echo $error;
                //$this->session->set_flashdata('error', $error);
                redirect('produk/index');
			} else {
				$data = [
					'nama'=> htmlspecialchars($this->input->post('nama')),
					'kode_produk'=> 'KM-' . date('ymdHis'), //generate code produk berdasarkan waktu saat ini
					'deskripsi_produk' => $this->input->post('deskripsi'),
					'gambar' => $this->upload->data('file_name'),
					'harga'=> htmlspecialchars($this->input->post('harga')),
					'stok'=> htmlspecialchars($this->input->post('stok')),
				];
				$this->db->insert('produk', $data);
			}
			redirect('/produk/index');
		}
	}

	// private function _get_code_produk() {
	// 	$this->db->select_max('id_produk');
	// 	$get =  $this->db->get('produk')->row_array();

	// 	if  ($get['id_produk']) {
	// 		$last = intval(substr($get['id_produk'], 2));
	// 		$new_num = $last + 1;
	// 		$new_kod = 'KM' . $new_num;
	// 	} else {
	// 		$new_kod = 'KM1';
	// 	}

	// 	return $new_kod;
	// }

	public function edit_produk() {
		$data['nama'] = htmlspecialchars($this->input->post('nama'));
		$data['harga'] = htmlspecialchars($this->input->post('harga'));
		$data['stok'] = htmlspecialchars($this->input->post('stok'));
		$this->db->update('produk', $data, ['id_produk' => $this->input->post('id_produk')]);
		redirect('/produk/index');
	}

	// public function delete_produk($kode_produk) {
	// 	if (!empty($kode_produk)) {
	// 		$produk = $this->db->get_where('produk', ['kode_produk' => $kode_produk])->row_array();
	// 		if ($produk) {
	// 			$gambar_produk = $produk['gambar'];
	// 			$gambar_path = './upload/produk/' . $gambar_produk;
	// 			if (file_exists($gambar_path)) {
	// 				unlink($gambar_path); // Hapus gambar dari direktori
	// 			}
	// 			$this->db->where('kode_produk', $kode_produk);
	// 			$this->db->delete('produk');
	// 			redirect('/produk/index');
	// 		} else {
	// 			redirect('/produk/index');
	// 		}
	// 	} else {
	// 		redirect('/produk/index');
	// 	}
	// }
	
	public function delete_produk_by_id($id) {
		if (!is_numeric($id)) {
			echo '<script>alert("ID produk tidak valid");</script>';
			redirect('produk/index');
		}
		// informasi produk berdasarkan ID
		$produk = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
	
		if (!$produk) {
			echo '<script>alert("Produk tidak ditemukan");</script>';
			redirect('produk/index');
		}

		$gambar_produk = $produk['gambar'];
		$path_image = './upload/produk/' . $gambar_produk;
		if (file_exists($path_image)) {
			unlink($path_image); // Hapus file gambar dari assets produk/upload
		}
		// Hapus data produk dari database
		$this->db->delete('produk', ['id_produk'=> $id]);
		echo '<script>alert("Produk berhasil dihapus");</script>';
		redirect('produk/index');
	}
	

	// public function delete_produk_by_id($image) {
	// 	$file = FCPATH .'upload/produk/'. $image;
	// 	if(file_exists($file)) {
	// 		unlink('.upload/produk/'. $image);
	// 	}
	// 	$this->db->delete('produk', ['foto' => $image]);
	// 	redirect('/produk/index');
	// }

	public function detail_produk() {
		
	}





}
