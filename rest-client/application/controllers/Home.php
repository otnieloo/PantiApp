<?php 

class Home extends CI_Controller {
    public function index($nama = '')
    {
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $this->load->view('oh/head', $data);
        $this->load->view('oh/header_sebelum',$data);
        $this->load->view('oh/index', $data);
        $this->load->view('oh/js');
    }
}