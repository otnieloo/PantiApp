<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class donasi extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Donasi_model','donasi');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$donasi = $this->donasi->getDonasi();
		}else{
			$donasi = $this->donasi->getDonasi($id);
		}

		if($donasi){
			$this->response([
				'status' => true,
				'data' => $donasi
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
			'email' => $this->post('email'),
			'jumlah' => $this->post('jumlah')
		];

		if ($this->donasi->createDonasi($data) > 0) {
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
			'jumlah' => $this->put('jumlah'),
			'email' => $this->put('email'),
		];

		if ($this->donasi->updateDonasi($data,$id) > 0) {
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
			if ($this->donasi->deleteDonasi($id) > 0) {
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

}
/* End of file donasi.php */
/* Location: ./application/controllers/api/donasi.php */