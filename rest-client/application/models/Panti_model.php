<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;


class Panti_model extends CI_Model {
	private $_client;
	private $_client2;

	public function __construct()
	{
		parent::__construct();
		$this->_client = new Client([
			'base_uri' => 'http://localhost/service2/api/panti/'
		]);
		$this->_client2 = new Client([
			'base_uri' => 'http://localhost/service1/api/'
		]);
	}

	public function getPanti($email=null){
		if ($email === null) {
			$response = $this->_client->request('GET','info');

			$result = json_decode($response->getBody()->getContents(), true);
		}else{
			$response = $this->_client->request('GET','info',[
				'query' => [
					'email' => $email
				]
			]);

			$result = json_decode($response->getBody()->getContents(), true);
		}

		return $result['data'];
	}
		
	public function getUser($email,$password)
	{
		$response = $this->_client2->request('GET','user',[
				'query' => [
					'email' => $email,
					'password' => $password
				]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		
		return $result['status'];
	}

	public function getUserData($email)
	{
		$response = $this->_client2->request('GET','user',[
				'query' => [
					'email' => $email
				]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		
		return $result['data'];	
	}


}

/* End of file Panti_model.php */
/* Location: ./application/models/Panti_model.php */