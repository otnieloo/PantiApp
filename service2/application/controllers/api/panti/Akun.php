<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class akun extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Akun_model','akun');
	}

	public function index_get()
	{
		$id = $this->get('email');
		if ($id === null) {
			$akun = $this->akun->getAkun();
		}else{
			$akun = $this->akun->getAkun($id);
		}

		if($akun){
			$this->response([
				'status' => true,
				'data' => $akun
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
			'password' => $this->post('password'),
		];

		$email = $this->post('email');
		$cekAkun = empty($this->akun->getAkun($email));

		if ($cekAkun) {
			if ($this->akun->createAkun($data) > 0) {
				$this->response([
					'status' => true,
					'message' => 'create success'
			], REST_Controller::HTTP_CREATED);
			}
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
			'password' => $this->put('password'),
		];

		if ($this->akun->updateAkun($data,$id) > 0) {
			$this->response([
					'status' => true,
					'message' => 'modify success'
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
					'status' => false,
					'message' => 'failed to update new data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_delete()
	{
		$id = $this->delete('email');

		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->akun->deleteAkun($id) > 0) {
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
/* End of file akun.php */
/* Location: ./application/controllers/api/akun.php */