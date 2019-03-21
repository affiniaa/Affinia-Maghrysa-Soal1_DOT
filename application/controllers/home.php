<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in')==TRUE){
		$data['konten']="home";
		$this->load->view('tamplate', $data);
	}
	else{
		redirect('login');
	}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */