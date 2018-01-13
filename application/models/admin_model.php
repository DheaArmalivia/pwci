<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
			parent::__construct();
			//Do your magic here
	}

	public function do_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db 	->where('username',$username)
							->where('password', $password)
							->get('admin'); 

		if($query->num_rows() > 0 ) {
			$data = array (
					'username'	=> $username,
					'logged_in'	=> TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function get_admin()
	{
		return $this->db->get('admin')
						->result();
	}

	public functoin get_data_menu()
	{
		return $this->db->order_by('id_menu','ASC')
						->get('menu')
						->result();
	}

	public function get_data_menuu()
	{
		return $this->db->get('menu')
						->result();
	}

	public function get_data_menu_by_id_menu($id_menu)
	{
		return $this->db->where('id_menu', $id_menu)
						->get('menu')
						->row();
	}

	public function update_menu($id_menu)
	{
		$data = array(
			'id_menu' 		=> $this->input->post('id_menu'), 
			'menu' 			=> $this->input->post('menu'),
			'harga'			=> $this->input->post('harga'), 
			'keterangan'	=> $this->input->post('keterangan'), 
			);

		$this->db->where('id_menu', $id_menu)
				->update('menu', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete_menu($id_menu){
		$this->db 	->where('id_menu', $id_menu)
					->delete('menu');

			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
	}

	public function do_insert_menu_baru()
	{
		$data = array(
			'id_menu' 		=> NULL, 
			'menu' 			=> $this->input->post('menu'),
			'harga'			=> $this->input->post('harga'), 
			'keterangan'	=> $this->input->post('keterangan'), 
				);

		$this->db->insert('menu', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}