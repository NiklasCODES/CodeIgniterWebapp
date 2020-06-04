<?php

class MainController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Login_model");
		$this->load->library("database");
		set_error_handler(function($errno, $errstr, $errfile, $errline ){
			//throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
		});
	}

	public function index() {
		$a = array( "context" => $this);
		$data['view'] = "menus/main";
		$data['ci'] = $this;
		$x = $this->database->getAllVotes($this);

		$s = $this->database->didUserVote($this, $this->session->userdata("id_user"));
		$arr = json_decode($s, true);
		log_message("error", "JSON String: " . $s);

		$resArr = $x->result_array();
		log_message("info", "JSON ARRAY TO STRING: " . json_encode($arr));
   		for($e = 0; $e < count($arr); $e++) {
   			for($i = 0; $i <= (count($resArr)-1); $i++) {
   				if($arr[$e]["value"]== $resArr[$i]["id"]) {
   					//log_message("error", "ARRAY: {$arr[$e][value]}, RESULT ARRAY: {$resArr[$i][id]}");
   					unset($resArr[$i]);
   				}
   				//log_message("error", "ARRAY: {$arr[$e][value]}, RESULT ARRAY: {$resArr[$i][id]}");
   			}
   			//log_message("error", "ARRAY: {$arr[$e][value]}");
		    } 

		$data["results"] = $resArr;
		$this->load->view("bones/skeleton", $data);
	}

	public function login() {
		if($_POST) {
			$result = $this->Login_model->check_user($_POST);
			
			if(!empty($result)) {
				$data = array(
					"id_user" => $result->ID,
					"username" => $result->User,
				);

				$this->session->set_flashdata("flash_data", "Password oder username is wrong");
				redirect("login");
			}
		}
		$this->load->view("templates/login");
	}

	public function vote($option) {
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

	function myErrorHandler($errno, $errstr, $errfile, $errline) {

	}
}
