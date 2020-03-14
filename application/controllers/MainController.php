<?php

class MainController extends CI_Controller {

	public function index() {

		$data['view'] = "menus/main";
		$data['ci'] = $this;
		$this->load->view("bones/skeleton", $data);
	}

}
