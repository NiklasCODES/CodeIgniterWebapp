<?php
class Login_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function check_user($data) {
		$result = $this->db->query("select * from User where username = \"{$data['username']}\" AND password = \"" . md5($data["password"]) . "\"");
		return $result;
	}

	public function addUser($data) {
		$result = $this->db->query("insert into User ( username, password) values (\"{$data['username']}\", \"" . md5($data['password']) . "\")");
	}
}
