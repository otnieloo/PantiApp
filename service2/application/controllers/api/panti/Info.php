<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class info extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Info_model','info');
	}

	public function index_get()
	{
		$id = $this->get('email');
		if ($id === null) {
			$info = $this->info->getInfo();
		}else{
			$info = $this->info->getInfo($id);
		}

		if($info){
			$this->response([
				'status' => true,
				'data' => $info
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
			'nama' => $this->post('nama'),
			'alamat' => $this->post('alamat'),
			'jenis' => $this->post('jenis'),
			'penghuni' => $this->post('penghuni'),
			'deskripsi' => $this->post('deskripsi')
		];

		if ($this->info->createInfo($data) > 0) {
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
		$id = $this->put('email');
		$data = [
			'nama' => $this->put('nama'),
			'alamat' => $this->put('alamat'),
			'jenis' => $this->put('jenis'),
			'penghuni' => $this->put('penghuni'),
			'deskripsi' => $this->put('deskripsi')
		];

		if ($this->info->updateInfo($data,$id) > 0) {
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
			if ($this->info->deleteInfo($id) > 0) {
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
/* End of file info.php */
/* Location: ./application/controllers/api/info.php */