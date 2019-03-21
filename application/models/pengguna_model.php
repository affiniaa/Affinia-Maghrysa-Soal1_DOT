<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	public function get_pengguna(){
		return $this->db->get('kasir')
						->result();
	}

	public function get_data_pengguna_by_id($id)
	{
		return $this->db->where('id_kasir', $id)
						->get('kasir')
						->row();
	}

	public function tambah()
	{
		$data = array(
				'nama_kasir'=> $this->input->post('nama_kasir'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password'),
			);

		$this->db->insert('kasir', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
				'nama_kasir' 		=> $this->input->post('ubah_nama_kasir'),
				'username'	=> $this->input->post('ubah_username'),
				'password'	=> $this->input->post('ubah_password'),
				'level'		=> $this->input->post('ubah_level')
			);

		$this->db->where('id_kasir', $this->input->post('ubah_id_kasir'))
				 ->update('kasir', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus()
	{
		$this->db->where('id_kasir', $this->input->post('hapus_id_kasir'))
				 ->delete('kasir');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */