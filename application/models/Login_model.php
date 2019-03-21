<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_user()
	{
		$u=$this->input->post('username');
		$p=$this->input->post('password');

		$query=$this->db->where('username',$u)
						->where('password',$p)
						->get('kasir');

		if($this->db->affected_rows()>0){
			$data_login =$query->row();

			$data_session= array(
							'username'=>$data_login->username,
							'logged_in'=>TRUE,
							'level'=>$data_login->level
			);
			$this->session->set_userdata($data_session);
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function register(){
  $fn = $this->input->post('fullname');
  $un = $this->input->post('username');
  $pw = md5($this->input->post('password'));
  $data = array(
   'id'=>'',
   'fullname'=>$fn,
   'username'=>$un,
   'password'=>$pw
  );
  $this->db->insert('kasir', $data);
 }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */