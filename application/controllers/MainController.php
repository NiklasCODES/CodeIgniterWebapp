<?php

class MainController extends CI_Controller {

	public function index() {
		$a = array( "context" => $this);
		$this->load->library("database");
		$data['view'] = "menus/main";
		$data['ci'] = $this;
		$x = $this->database->getAllVotes($this);
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

	public function incrementSubmission($option) {
		$this->load->library("database");
		$this->database->incrementVoteCount( $option, $this);
		$this->showResults();
	}
	
	public function showResults() {
		$this->load->library("database");
		//$resOne = $this->database->getData($this);
		//$this->database->updateVoteCount( $option, $this);	
		//$resTwo = $this->database->getVoteResults("Coca Cola", "Pepsi", $this);
		$allVotes = $this->database->getAllVotes($this);
		$res = $this->database->getAllVoteResults($this);
		$c = array();
		foreach($res->result_array() as $row) {
			$c[$row["Name"]] = $row["Count"];
		}
		$var = array(); 
		$i = 0;
		foreach($allVotes->result_array() as $row) {
			$var[$i] = array("name" => $row["name"],
							"left" => $row["left"],
							"right" => $row["right"],
							"resLeft" => $c[$row["left"]],
							"resRight" => $c[$row["right"]]);
			$i++;
		}
		//echo $resOne->result()[0]->name;
			
		
		/*$row = $resOne->result()[0];
		$var = array( "name" => $row->name,
					"left" => $row->left,
					"right" => $row->right,
					"resLeft" => $resTwo["left"],
					"resRight" => $resTwo["right"]);*/

        $data = array( "data" => $var, "ci" => $this);

		//$params = array( "result" => )
		$this->load->view("templates/results", $data);
	}

}
