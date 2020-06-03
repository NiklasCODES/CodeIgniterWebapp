<?php

class Database {

	function getData($instance) {
		$instance->load->database();
    	return $instance->db->query("select * from Votes where id = 0");
	}

	function updateVoteCount($vote, $instance) {
		
		$instance->load->database();
		$db->query("update Submissions set Count = Count + 1 where Name = $vote");
	}

	function getVoteResults($left, $right, $instance) {
		$instance->load->database();
		$resLeft = $db->query("select * from Submissions where name = $left");
		$resRight = $db->query("select * from Submissions where name = $right");
		return array("left" => $resLeft->result()["Count"], "right" => $resRight->result()["Count"]);
	}
}
