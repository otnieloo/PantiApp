<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class kontak extends REST_Controller 
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

		if ($this->kontak->createKontak($data) > 0) {
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
			'nama' => $this->put('nama'),
			'nomor' => $this->put('nomor'),
		];

		if ($this->kontak->updateKontak($data,$id) > 0) {
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

	public function index_delete()
	{
		$id = $this->delete('id');

		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->kontak->deleteKontak($id) > 0) {
				//ok
				$this->response([
					'status' => true,
					'id' => $id,
					'message' => 'deleted'
			], REST_Controller::HTTP_NO_CONTENT);
			}else{
				//not found
				$this->response([
					'status' => false,
					'message' => 'id not found'
			], REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}

	public function phpInfo($value='')
	{
		phpInfo();
	}

}
/* End of file Kontak.php */
/* Location: ./application/controllers/api/Kontak.php */