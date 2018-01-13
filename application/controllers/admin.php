<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation', 'session');
		//Do your magic here
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			redirect(base_url('index.php/admin/dashboard'));
		}else {
			$this->load->view('login_view');
		}
	}	

	public function do_login()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				if($this->admin_model->do_login()){

					redirect(base_url('index.php/admin/dashboard'));

				}else {

					$data['notif'] = 'Gagal Login !!';
					$this->load->view('login_view');

				}
			} else {

				$data['notif'] = validation_errors();
				$this->load->view('login_view');

			}
		}else {

			$this->load->view('login_view');

		}
	}

	public function dashboard()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'dashboard_view';	
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function logout()
	{
		$data = array(
				'username' => '',
				'logged_in'=> FALSE
			);
		$this->session->sess_destroy();
		redirect(base_url('index.php/admin'));
	}

	public function data_menu()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'data_menu_view';
			$data['menu'] = $this->admin_model->get_data_menu();
			$data['menuu'] = $this->admin_model->get_data_menuu();
			$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function edit_menu()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['main_view'] = 'edit_menu';
			$id_menu = $this->uri->segment(3);
			$data['get_data_menu_by_id_menu'] = $this->admin_model->get_data_menu_by_id_menu();
			// $data['edit_menu'] = $this->admin_model->get_data_menu_by_id_menu($id_menu);

			$this->load->view('template', $data);
		} else {
			redirect('admin','refresh');
		}
	}

	public function do_edit_menu()
	{
		if ($this->session->userdata('logged_in') == TRUE) {

			$id_menu = $this->uri->segment(3);

			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('id_menu', 'id_menu', 'trim|required');
				$this->form_validation->set_rules('menu', 'Menu', 'trim|required');
				$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
				$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					if ($this->admin_model->update_menu($id_menu) == TRUE) {
						
						redirect(base_url('index.php/admin/data_menu'));
					} else {
						
						$data['notif'] = 'Update Gagal!';
						$data['main_view'] = 'data_menu_view';
						$this->load->view('template', $data);
					}
					
				} else {
					$data['notif'] = validation_errors();

					$data['main_view'] = 'data_menu_view';
					$this->load->view('template', $data);
				}
			}
		}
	}

	public function delete_menu(){
		if($this->session->userdata('logged_in') == TRUE) {
			$id_menu = $this->uri->segment(3);

			if($this->admin_model->delete_menu($id_menu) == TRUE) {
				$this->session->set_flashdata('notif','Hapus Sukses');
				redirect(base_url('index.php/admin/data_menu'));
			}else {
				$this->session->set_flashdata('notif','Hapus Gagal !!');
				redirect(base_url('index.php/admin/data_menu'));
			}
		}else {
			redirect('admin');
		}
	}

	public function tambah_menu_bulanan()
	{
		if($this->session->userdata('logged_in') == TRUE){
		$data['main_view'] = 'tambah_menu_bulanan';
		$data['admin_insert'] = $this->admin_model->get_admin();
		$this->load->view('template',$data);
		} else {
			redirect('admin');
		}
	}

	public function do_insert_menu_baru()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
			// $this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
			$this->form_validation->set_rules('menu', 'menu', 'trim|required');	
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
					if ($this->admin_model->do_insert_menu_baru() == TRUE) {
						$data['notif'] = 'Tambah Berhasil!';
						$data['main_view'] = 'data_menu_view';
						$this->load->view('template', $data);
						// redirect(base_url('index.php/admin/data_menu'));
					} else {
						
						$data['notif'] = 'Tambah Gagal!';
						$data['main_view'] = 'data_menu_view';
						$this->load->view('template', $data);
					}
				
			} else {
				$data['notif'] = validation_errors();

				$data['main_view'] = 'data_menu_view';
				$this->load->view('template', $data);
			}
		} 
	}

	
}
