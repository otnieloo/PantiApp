<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/Mongo_db.php';


class coba extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Coba_model','coba');
	}


	public function index_get()
	{
		$coba = $this->coba->getCoba();
		$this->response([
			'status' => 'true',
			'data'	=> $coba
		],REST_Controller::HTTP_OK);
	}

}

/* End of file Coba.php */
/* Location: ./application/controllers/api/Coba.php */