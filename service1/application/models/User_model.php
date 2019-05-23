<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function getUser($id=null,$pass=null)
	{
		if ($id === null && $pass === null) {
			return $this->mongo_db->get('User');

		}else if($id !== null && $pass !== null){
			return $this->mongo_db->get_where('User',[
				'email' => $id,
				'password' => $pass
			]);
		}else{
			return $this->mongo_db->get_where('User',[
				'email' => $id
			]);
		}
	}
	
	function deleteUser($id)
	{
		$this->mongo_db->where('email',$id);
		$this->mongo_db->delete('User');
		return true;
	}

	function createUser($data)
	{
		$this->mongo_db->insert('User', $data);
		return 	true;
	}

	function updateUser($data,$id)
	{
		$this->mongo_db->where(array('email'=>$id))->set($data)->update('User');
		return true;
	}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */