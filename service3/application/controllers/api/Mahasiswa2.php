<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class mahasiswa2 extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kontak_model','kontak');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$kontak = $this->kontak->getKontak();
		}else{
			$kontak = $this->kontak->getKontak($id);
		}

		if($kontak){
			$this->response([
				'status' => true,
				'data' => $kontak
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' => true,
				'message' => 'not found'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		$data = [
			'nama' => $this->post('nama'),
			'nomor' => $this->post('nomor'),
		];

		if ($this->mahasiswa->createKontak($data) > 0) {
			$this->response([
					'status' => true,
					'message' => 'create success'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
					'status' => false,
					'message' => 'failed to create new data'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama' => $this->post('nama'),
			'nomor' => $this->post('nomor'),
		];

		if ($this->mahasiswa->updateKontak($data,$id) > 0) {
			$this->response([
					'status' => true,
					'message' => 'modify success'
			], REST_Controller::HTTP_NO_CONTENT);
		}else{
			$this->response([
					'status' => false,
					'message' => 'failed to update new data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}
/* End of file Kontak.php */
/* Location: ./application/controllers/api/Kontak.php */