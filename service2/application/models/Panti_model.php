<?php
class Panti_model extends CI_Model {
	function getPanti($id=null)
	{
		if ($id === null) {
			return $this->db->get('Panti')->result_array();

		}else{
			return $this->db->get_where('Panti',['id' => $id])->result_array();
		}
	}
	
	function deletePanti($id)
	{
		$this->db->delete('Panti',['id'  => $id]);
		return $this->db->affected_rows();
	}

	function createPanti($data)
	{
		$this->db->insert('Panti', $data);
		return $this->db->affected_rows();
	}

	function updatePanti($data,$id)
	{
		$this->db->update('Panti',$data, ['id' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Panti_model.php */
/* Location: ./application/models/Panti_model.php */