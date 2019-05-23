<?php
class Donasi_model extends CI_Model {
	function getDonasi($id=null)
	{
		if ($id === null) {
			return $this->db->get('donasi')->result_array();

		}else{
			return $this->db->get_where('donasi',['id' => $id])->result_array();
		}
	}
	
	function deleteDonasi($id)
	{
		$this->db->delete('donasi',['id'  => $id]);
		return $this->db->affected_rows();
	}

	function createDonasi($data)
	{
		$this->db->insert('donasi', $data);
		return $this->db->affected_rows();
	}

	function updateDonasi($data,$id)
	{
		$this->db->update('donasi',$data, ['id' => $id]);
		return $this->db->affected_rows();
	}

}

/* End of file Donasi_model.php */
/* Location: ./application/models/Donasi_model.php */