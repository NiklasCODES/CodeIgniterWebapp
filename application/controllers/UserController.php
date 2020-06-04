<?php
class UserController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
	}
	   
	   
	public function view(){
	   
		if($_POST){
	   
		    $result = $this->Login_model->check_user($_POST);
	   
			if($result->num_rows() > 0){
				$data = array(
					'id_user' => $result->result()[0]->id,
					'username' => $result->result()[0]->username
				);
				$this->session->set_userdata($data);
				redirect('/'); // eure Datenseite !!!!!!!!!!!!!!!
			} else {
				$this->session->set_flashdata('flash_data', 'Passwort oder User falsch');
				redirect('/login');
			}
		} 
		$this->load->view("templates/login");
	}

	public function logout() {
		$data = array("id_user", "username");
		$this->session->unset_userdata($data);

		redirect("login");
	}
	   
}
