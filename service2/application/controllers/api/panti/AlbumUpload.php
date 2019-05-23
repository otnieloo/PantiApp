 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlbumUpload extends CI_Controller {

	public function index()
	{
		$this->load->view('v_upload', array('error' => ' ' ));
	}

}

/* End of file AlbumUpload.php */
/* Location: ./application/controllers/api/panti/AlbumUpload.php */ ?>