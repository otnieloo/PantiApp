<?php
class Info_model extends CI_Model {
	function getInfo($id=null)
	{
		if ($id === null) {
			return $this->db->get('info')->result_array();

		}else{
			return $this->db->get_where('info',['email' => $id])->result_array();
		}
	}
	
	function deleteInfo($id)
	{
		$this->db->delete('info',['email'  => $id]);
		return $this->db->affected_rows();
	}

	function createInfo($data)
	{
		$this->db->insert('info', $data);
		return $this->db->affected_rows();
	}

	function updateInfo($data,$id)
	{
		$this->db->update('info',$data, ['email' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Info_model.php */
/* Location: ./application/models/Info_model.php */