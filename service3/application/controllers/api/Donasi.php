<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/Mongo_db.php';


class Donasi extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Donasi_model','Donasi');
	}

	public function index_get()
	{
		$user = $this->get('user');
		$panti = $this->get('panti');
		if ($user === null && $panti === null) {
			$Donasi = $this->Donasi->getDonasi();
		}else if(isset($user)){
			$Donasi = $this->Donasi->getDonasi($user);
		}else if(isset($panti)){
			$Donasi = $this->Donasi->getPanti($panti);
		}

		if($Donasi){
			$this->response([
				'status' => true,
				'data' => $Donasi
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
		$id = $this->post('user').$this->post('panti');
		$data = [
			'id' => $id,
			'user' => $this->post('user'),
			'panti' => $this->post('panti'),
			'jumlah' => $this->post('jumlah'),
			'tanggal' => date('Y:m:dH:i:s'),
			'status' => 'u'	
		];

		if ($this->Donasi->createDonasi($data)) {
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
			'user' => $this->put('user'),
			'panti' => $this->put('panti'),
			'jumlah' => $this->put('jumlah'),
			'tanggal' => $this->put('tanggal'),
			'status' => $this->put('status')
		];
		if ($this->Donasi->updateDonasi($data,$id)) {
			$this->response([
					'status' => true,
					'message' => $data
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
		$email = $this->delete('email');

		if ($email === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an email'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->Donasi->deleteDonasi($email)) {
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