<?php

class Database {

	function getData($instance) {
		$instance->load->database();
    	return $instance->db->query("select * from Votes where id = 1");
	}

	function didUserVote($instance, $userId) {
		$instance->load->database();
		return $instance->db->query("select * from User where id = \"$userId\"")->result()[0]->votedIn;
	}

	function incrementVoteCount($vote, $instance) {
		
		$instance->load->database();
		$instance->db->query("update Submissions set Count = Count + 1 where Name = '$vote'");
	}

	function createVoting($instance, $name, $left, $right) {
		$instance->load->database();
		$instance->db->query("insert into Votes ( name, left, right) values ( \"$name\", \"$left\", \"$right\")");
		$instance->db->query("insert into Submissions ( Name) values (\"$left\"), (\"$right\")");
	}

	function getVoteResults($left, $right, $instance) {
		$instance->load->database();
		$resLeft = $instance->db->query("select * from Submissions where name = '$left'");
		$resRight = $instance->db->query("select * from Submissions where name = '$right'");
		return array("left" => $resLeft->result()[0]->Count, "right" => $resRight->result()[0]->Count);
	}

	function getAllVoteResults($instance) {
		$instance->load->database();
		return $instance->db->query("select * from Submissions");
	}

	function getAllVotes($instance) {
		$instance->load->database();
		return $instance->db->query("select * from Votes");
	}
}
