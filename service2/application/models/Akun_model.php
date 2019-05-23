<?php
class Akun_model extends CI_Model {
	function getAkun($id=null)
	{
		if ($id === null) {
			return $this->db->get('akun')->result_array();

		}else{
			return $this->db->get_where('akun',['email' => $id])->result_array();
		}
	}
	
	function deleteAkun($id)
	{
		$this->db->delete('akun',['email'  => $id]);
		return $this->db->affected_rows();
	}

	function createAkun($data)
	{
		$this->db->insert('akun', $data);
		return $this->db->affected_rows();
		
	}

	function updateAkun($data,$id)
	{
		$this->db->update('akun',$data, ['email' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */