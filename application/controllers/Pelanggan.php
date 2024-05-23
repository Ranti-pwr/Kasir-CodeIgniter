<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Pelanggan';
		$this->db->from('pelanggan')->order_by('nama', 'asc');
		$data['pelanggan'] = $this->db->get()->result_array();
		$this->teplat->load('temp', 'pelanggan', $data);
	}

	public function add_pelanggan() {
		$this->form_validation->set_rules('nama', 'Name Produk', 'required|trim');
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
	//	$this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|trim');
		$this->form_validation->set_rules('tlpn', 'tlp', 'required|trim');

		$this->db->from('pelanggan')->where('nama', $this->input->post('nama'));
		$pelanggan = $this->db->get()->result_array();

		if($this->form_validation->run() == false) {
			echo '<script>alert("Gagal Menyimpan data pelanggan");</script>';
			// echo json_encode('Gagal Menyimpan data produk');
		} elseif ($pelanggan <> null) {
			 echo '<script>alert("Nama telah tersedia");</script>';
			//echo json_encode('Data Produk telah tersedia');
		} else {
				$data = [
					'nama'=> htmlspecialchars($this->input->post('nama')),
					// 'kode_produk'=> 'KM-' . date('ymdHis'), //generate code produk berdasarkan waktu saat ini
					'alamat' => $this->input->post('alamat'),
					// 'gambar' => $this->upload->data('file_name'),
					'tlpn'=> htmlspecialchars($this->input->post('tlpn')),
					// 'stok'=> htmlspecialchars($this->input->post('stok')),
				];
				$this->db->insert('pelanggan', $data);
			}
			redirect('/pelanggan/index');
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

	public function delete_pelanggan_by_id($id) {
        $this->db->delete('pelanggan', ['id_pelanggan' => $id]);
        redirect('/pelanggan/index');
    }

	public function edit_pelanggan() {
		$data['nama'] = htmlspecialchars($this->input->post('nama'));
		$data['alamat'] = htmlspecialchars($this->input->post('alamat'));
		$data['tlpn'] = htmlspecialchars($this->input->post('tlpn'));
		$this->db->update('pelanggan', $data, ['id_pelanggan' => $this->input->post('id_pelanggan')]);
		redirect('/pelanggan/index');
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
	
	// public function delete_produk_by_id($id) {
	// 	if (!is_numeric($id)) {
	// 		echo '<script>alert("ID produk tidak valid");</script>';
	// 		redirect('produk/index');
	// 	}
	// 	// informasi produk berdasarkan ID
	// 	$produk = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
	
	// 	if (!$produk) {
	// 		echo '<script>alert("Produk tidak ditemukan");</script>';
	// 		redirect('produk/index');
	// 	}

	// 	$gambar_produk = $produk['gambar'];
	// 	$path_image = './upload/produk/' . $gambar_produk;
	// 	if (file_exists($path_image)) {
	// 		unlink($path_image); // Hapus file gambar dari assets produk/upload
	// 	}
	// 	// Hapus data produk dari database
	// 	$this->db->delete('produk', ['id_produk'=> $id]);
	// 	echo '<script>alert("Produk berhasil dihapus");</script>';
	// 	redirect('produk/index');
	// }
	

	// public function delete_produk_by_id($image) {
	// 	$file = FCPATH .'upload/produk/'. $image;
	// 	if(file_exists($file)) {
	// 		unlink('.upload/produk/'. $image);
	// 	}
	// 	$this->db->delete('produk', ['foto' => $image]);
	// 	redirect('/produk/index');
	// }

	// public function detail_produk() {
		
	// }





}
