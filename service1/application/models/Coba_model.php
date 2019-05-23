<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba_model extends CI_Model {
	function getCoba()
	{
		return $this->mongo_db->get('aku');
	}

}

/* End of file Coba_model.php */
/* Location: ./application/models/Coba_model.php */