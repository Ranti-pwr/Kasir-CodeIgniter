<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Kategori';
		$this->teplat->load('temp', 'kategori', $data);
	}
}
