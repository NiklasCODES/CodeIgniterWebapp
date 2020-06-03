<?php

class Database {
	function getData($instance) {
        $instance->load->database();
    	return $instance->db->query("select * from Votes");
	}

	function insertVote($vote, $instance) {
		$instance->load->database();
		$instance->db->query("update Submissions set Count = Count + 1 where Name = $vote");
	}
}
