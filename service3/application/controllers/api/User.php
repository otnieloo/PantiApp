<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/Mongo_db.php';


class user extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
	}

	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$user = $this->user->getUser();
		}else{
			$user = $this->user->getUser($id);
		}

		if($user){
			$this->response([
				'status' => true,
				'data' => $user
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
			'email' => $this->post('email'),
			'passowrd' => $this->post('password'),
			'alamat' => $this->post('alamat'),
			'pekerjaan' => $this->post('pekerjaan')	
		];

		if ($this->user->createUser($data)) {
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
		$email = $this->put('email');
		$data = [
			'nama' => $this->put('nama'),
			'nomor' => $this->put('nomor'),
			'password' => $this->put('password'),
			'alamat' => $this->put('alamat'),
			'pekerjaan' => $this->put('pekerjaan')
		];

		print_r($data);
		if ($this->user->updateUser($data,$email)) {
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
		$email = $this->delete('email');

		if ($email === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an email'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->user->deleteuser($email)) {
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

/* End of file Coba.php */
/* Location: ./application/controllers/api/Coba.php */