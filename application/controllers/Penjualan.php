<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Penjualan';
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('y-m-d');
		$data['user'] = $this->db->order_by('tanggal', 'desc')->where('penjualan.tanggal',$tanggal)->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')->get('penjualan')->result_array();
		$data['penjualan'] = $this->db->order_by('tanggal', 'desc')->where('tanggal',$tanggal)->get('penjualan')->result_array();
		$data['pelanggan'] = $this->db->order_by('nama', 'asc')->get('pelanggan')->result_array();
		$this->teplat->load('temp', 'penjualan', $data);

	}

	private function input(){
		$input = $this->input->post();
	}

	public function transaksi($id_pelanggan) {
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$jumlah = $this->db->where('tanggal', $tanggal)->count_all_results('penjualan') == 0;
		$nota = date("ymd").$jumlah + 1;
		$produk = $this->db->order_by('nama', 'asc')->where('stok >',0)->get('produk')->result_array();
		$pelanggan =  $this->db->where('id_pelanggan',$id_pelanggan)->get('pelanggan')->row()->nama;
		$detail =  $this->db->where('detail_penjualan.kode_penjualan',$nota)->join('produk', 'detail_penjualan.id_produk = produk.id_produk')->get('detail_penjualan')->result_array();
		$tempo =  $this->db->where('tempori.id_user',$this->session->userdata('id_user'))->where('tempori.id_pelanggan',$id_pelanggan)->join('produk', 'tempori.id_produk = produk.id_produk')->get('tempori')->result_array();
		//$detail = $this->db->from('a detail_penjualan')->join('b produk', 'a.id_produk=b.id_produk', 'left')->where('a.kode_penjualan',$nota)->get()->result_array();
		$data['nota'] = $nota;
		$data['detail'] = $detail;
		$data['produk'] = $produk;
		$data['id_pelanggan'] = $id_pelanggan;
		$data['nama'] = $pelanggan;
		$data['tempori'] = $tempo;
		$data['title'] = 'Sale Transaction';
		$this->teplat->load('temp', 'transaksi', $data);
	}

	public function add_ker() {
		$input = $this->input->post();
		$stock_lama =  $this->db->where('id_produk',$input['id_produk'])->get('produk')->row()->stok;
		$qer =  $this->db->where('id_produk',$input['id_produk'])->where('id_user', $this->session->userdata('id_user'))->where('id_pelanggan',$input['id_pelanggan'])->get('tempori')->result_array();
		if ($stock_lama < $input['jumlah']) {
			echo "<script>alert('Maaf, Stok Produk Tidak Mencukupi')</script>";
			// redirect($_SERVER['HTTP_REFERER']);
		} else {
			if($qer <> null) {
				echo "<script>alert('Maaf, Stok Produk Telah Dipilih')</script>";
			} else {
				$data = [
					'id_pelanggan' => $input['id_pelanggan'],
					'id_user' => $this->session->userdata('id_user'),
					'id_produk' => $input['id_produk'],
					'jumlah' => $input['jumlah'],
				];
				$this->db->insert('tempori', $data);
			}
		}
	}

	public function tambah_ker() {
		$input = $this->input->post();
		$harga =  $this->db->where('id_produk',$input['id_produk'])->get('produk')->row()->harga;
		$stock_lama =  $this->db->where('id_produk',$input['id_produk'])->get('produk')->row()->stok;
		$qer =  $this->db->where('id_produk',$input['id_produk'])->where('kode_penjualan', $input['kode_penjualan'])->get('detail_penjualan')->result_array();
		if($qer <> null) {
			echo "<script>alert('Maaf, Stok Produk Telah Dipilih')</script>";
		} 
			if ($stock_lama < $input['jumlah']) {
				echo "<script>alert('Maaf, Stok Produk Tidak Mencukupi')</script>";
				// redirect($_SERVER['HTTP_REFERER']);
		} else {
			$stock_sek =  $stock_lama - $input['jumlah'];
			$sub_total = $input['jumlah'] * $harga;
			$data = [
				'kode_penjualan' => $input['kode_penjualan'],
				'id_produk' => $input['id_produk'],
				'jumlah' => $input['jumlah'],
				'sub_total' => $sub_total,
			];
			$this->db->insert('detail_penjualan', $data);
			$data2['stok'] = $stock_sek;
			$where['id_produk'] = $input['id_produk'];
			$this->db->update('produk', $data2, $where);
			redirect($_SERVER['HTTP_REFERER']);
		}
	
}

	public function delete_produk_by_id($id_detail, $id_produk) {
		$jumlah =  $this->db->where('id_detail',$id_detail)->get('detail_penjualan')->row()->jumlah;
		$stock_lama =  $this->db->where('id_produk',$id_produk)->get('produk')->row()->stok;
		$stock_sek =  $jumlah + $stock_lama;
		$data2['stok'] = $stock_sek;
		$where['id_produk'] = $id_produk;
		$this->db->update('produk', $data2, $where);

		$this->db->delete('detail_penjualan', ['id_detail' => $id_detail]);
        redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function hapus_tempori($id_temp) {
		$this->db->delete('tempori', ['id_tempori' => $id_temp]);
        redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function bayar() {
		$inp = $this->input->post();
		$data = [
			'kode_penjualan' => $inp['kode_penjualan'],
			'id_pelanggan' => $inp['id_pelanggan'],
			'total_harga' => $inp['total_harga'],
			'tanggal' => date('Y-m-d'),
		];	
		$this->db->insert('penjualan', $data);
		redirect('penjualan/invo/'. $inp['kode_penjualan']);
		//$this->db->from('categori')->get()->result_array();
	}

	public function invo($kode_penjualan) {
		$detail =  $this->db->where('detail_penjualan.kode_penjualan',$kode_penjualan)->join('produk', 'detail_penjualan.id_produk = produk.id_produk')->get('detail_penjualan')->result_array();
		$penjualan = $this->db->order_by('tanggal', 'desc')->where('penjualan.kode_penjualan',$kode_penjualan)->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan')->get('penjualan')->row();
		$data = [
			'title' => "Bayar",
			'nota' => $kode_penjualan,
			'penjualan' => $penjualan,
			'detail' => $detail,

		];
		$this->teplat->load('temp', 'inpoo', $data);
	}
}
