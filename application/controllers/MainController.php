<?php

class MainController extends CI_Controller {

	public function index() {

		$data['view'] = "menus/main";
		$data['ci'] = $this;
		$this->load->library("database");
		$x = $this->database->getData($this);
		$data["results"] = $x;
		$this->load->view("bones/skeleton", $data);

		//hallo

	}
}
