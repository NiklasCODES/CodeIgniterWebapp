<?php

class MainController extends CI_Controller {

	public function index() {
		$a = array( "context" => $this);
		$this->load->library("database");
		$data['view'] = "menus/main";
		$data['ci'] = $this;
		$x = $this->database->getData($this);
		$data["results"] = $x;
		$this->load->view("bones/skeleton", $data);

		//hallo

	}

	public function vote($option) {
		$this->load->libary("database");
		$this->database->updateVoteCount($option, $this);
	}

	public function getVoteCount($id) {
		
	}

	public function showResults() {
		$this->load->library("database");
		$res = $this->database->getData($this);
		$var = NULL;
		foreach($res->result() as $row) {
			$var = array( "name" => $row->name,
						"left" => $row->left,
						"right" => $row->right,
						"resLeft" => 5,
						"resRight" => 5);
		}

		//$params = array( "result" => )
		$this->load->view("templates/result", $var);
	}

}
