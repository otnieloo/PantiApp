<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Panti_model','panti');
		$this->load->helper('form');
		$this->load->library('session');
	}

	public function index()
	{


		$data['info'] = $this->panti->getPanti();

		$this->load->view('oh/head');
		$this->load->view('oh/header');
		$this->load->view('oh/index',$data);
		$this->load->view('oh/footer');
		$this->load->view('oh/js');
	}

	public function detail($email)

	{
		$data['info'] = $this->panti->getPanti($email);

		$this->load->view('oh/head');
		$this->load->view('oh/header_sebelum');
		$this->load->view('oh/detail',$data);
		$this->load->view('oh/footer');
		$this->load->view('oh/js');
	}

	public function daftar_panti()
	{
		$data['info'] = $this->panti->getPanti();

		$this->load->view('oh/head');
		$this->load->view('oh/header_sebelum');
		$this->load->view('oh/kategori',$data);
		$this->load->view('oh/footer');
		$this->load->view('oh/js');
	}

	public function login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$status = $this->panti->getUser($email,$password);

		// var_dump($status);

		//Login authentication
		if ($status) {
			$data = $this->panti->getUserData($email);
			
			$array = array(
				'nama' => $data[0]['nama'],
				'nomor' => $data[0]['nomor'],
				'email' => $data[0]['email'],
				'alamat' => 'asd',
				'pekerjaan' => $data[0]['pekerjaan']
			);

			print_r($array);
			

			$this->session->userdata($array);

			$this->profile($email);

			
		}else{

		}
	}

	public function profile($email)
	{
		$data['info'] = $this->panti->getUserData($email);

		$this->load->view('oh/head');
		$this->load->view('oh/header');
		$this->load->view('oh/profile',$data);
		$this->load->view('oh/footer');
		$this->load->view('oh/js');
	}

}

/* End of file Panti.php */
/* Location: ./application/controllers/Panti.php */ ?>