<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class album extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Album_model','album');

		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'jpg|png|gif';
		$config['max_size']             = 2000;
		$config['max_width']            = 2048;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);
		
	}

	public function upload()
	{
		$this->load->view('v_upload', array('error' => ' ' ));
	}

	public function index_get()
	{
		
		$id = $this->get('email');
		if ($id === null) {
			$album = $this->album->getAlbum();
		}else{
			$album = $this->album->getAlbum($id);
		}

		if($album){
			$this->response([
				'status' => true,
				'data' => $album
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
		$this->upload->do_upload("berkas");
		$data = [
			'email' => $this->post('email'),
			'gambar' => $this->upload->data("file_name")
		];

		if ($this->album->createAlbum($data) > 0) {
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

		if ($this->album->updateAlbum($data,$id) > 0) {
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
		$id = $this->delete('gambar');
		$email = $this->delete('email');

		if ($id === null) {
			$this->response([
				'status' => false,
				'message' => 'provide an id'
			], REST_Controller::HTTP_BAD_REQUEST);
		}else{
			if ($this->album->deleteAlbum($id,$email) > 0) {
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
/* End of file album.php */
/* Location: ./application/controllers/api/album.php */