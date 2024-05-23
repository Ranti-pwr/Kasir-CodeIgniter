<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() 
    {  
        parent::__construct();   
        // if($this->session->userdata('level') !="admin"){redirect('login');}    
         if($this->session->userdata('level') === null){redirect('auth');}    
    }
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$hari_ini = $this->db->where("DATE_FORMAT(tanggal, '%Y-%m-%d') = '$tanggal'")->select('SUM(total_harga) as total')->get('penjualan')->row()->total;
		$transaksi = $this->db->where("DATE_FORMAT(tanggal, '%Y-%m-%d') = '$tanggal'")->count_all_results('penjualan');
		$produk = $this->db->count_all_results('produk');
		$bulan_ini = $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') = '".substr($tanggal, 0, 7)."'")->select('SUM(total_harga) as total')->get('penjualan')->row()->total;
		$hari_ini = $hari_ini ?? 0;
		$bulan_ini = $bulan_ini ?? 0;
		$transaksi = $transaksi ?? 0;

		// if($hari_ini == null) {$hari_ini = 0;}
		// if($bulan_ini == null) {$bulan_ini = 0;}
		// if($transaksi == null) {$transaksi = 0;}
		// $jumlah_pengunjung = $this->db->query("SELECT COUNT(*) as jmlh FROM pengunjung WHERE tanggal= '$tanggal'");
		//$data['jumlah_pengunjung']=$this->db->query("SELECT COUNT(id) as jml FROM pengunjung WHERE tanggal= '$tanggal' ")->row()->
		// $jadwal = $this->db->query("SELECT * FROM jadwal WHERE tanggal='$tanggal'");
		// $id_user=$this->session->userdata('id_user');
		// $cek=$this->M_Periksa->get_data_periksa($id_user,$tanggal);
		// if ($cek) {
		// 	$data['status']=1;
		// 	$data['data']=$cek;
		// }else{
		// 	$data['status']=0;
		// 	$data['data']=null;
		// }
		$data['title'] = 'Dashboard';
		$data['hari_ini'] = $hari_ini;
		$data['transaksi'] = $transaksi;
		$data['bulan_ini'] = $bulan_ini;
		$data['produk'] = $produk;
		$this->teplat->load('temp', 'dashboard', $data);
	}
}
