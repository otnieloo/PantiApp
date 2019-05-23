<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi_model extends CI_Model {

	function getDonasi($id=null)
	{
		if ($id === null) {
			return $this->mongo_db->get('Donasi');

		}else{
			return $this->mongo_db->get_where('Donasi',['user' => $id]);
		}
	}
	
	function getPanti($id=null)
	{
		if ($id === null) {
			return $this->mongo_db->get('Donasi');

		}else{
			return $this->mongo_db->get_where('Donasi',['panti' => $id]);
		}
	}

	function deleteDonasi($id)
	{
		$this->mongo_db->where('email',$id);
		$this->mongo_db->delete('Donasi');
		return true;
	}

	function createDonasi($data)
	{
		$this->mongo_db->insert('Donasi', $data);
		return true;
	}

	function updateDonasi($data,$id)
	{
		if ($this->mongo_db->where(array('id'=>$id))->set($data)->update('Donasi')) {
			return true;
		}else{
			return false;
		}
		
	}
	

}

/* End of file Donasi_model.php */
/* Location: ./application/models/Donasi_model.php */