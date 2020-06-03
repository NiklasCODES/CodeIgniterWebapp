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
		$this->load->libary("database");
		$result = $this->database->getData($this);
		$var = NULL;
		foreach($result->result() as $row) {
			$var = $this->database->getVoteResults($row["left"], $row["right"], $this);
		}
	}

	public function showResults($arr, $data) {
		$params["name"] = $data["name"]; 
		$params["left"] = $data["left"];
		$params["resLeft"] = $arr["left"];
		$params["right"] = $data["right"];
		$params["resRight"] = $arr["right"]; 
		$this->load->view("templates/result", $params);
	}
}
