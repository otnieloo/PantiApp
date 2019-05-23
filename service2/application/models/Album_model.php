<?php
class Album_model extends CI_Model {
	function getAlbum($id=null)
	{
		if ($id === null) {
			return $this->db->get('album')->result_array();

		}else{
			return $this->db->get_where('album',['email' => $id])->result_array();
		}
	}
	
	function deleteAlbum($id,$email)
	{
		$this->db->delete('album',['gambar'  => $id, 'email'=>$email]);
		return $this->db->affected_rows();
	}

	function createAlbum($data)
	{
		$this->db->insert('album', $data);
		return $this->db->affected_rows();
	}

	function updateAlbum($data,$id)
	{
		$this->db->update('album',$data, ['id' => $id]);
		return $this->db->affected_rows();
	}



}

/* End of file Album_model.php */
/* Location: ./application/models/Album_model.php */