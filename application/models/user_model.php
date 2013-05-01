<?php

class user_model extends CI_Model{

	function __construct(){
	
	}
	public function verify_user($user_name, $pass_word){
		//query credentials against the database
		$q = $this->db
				->where('username', $user_name)
				->where('password', sha1($pass_word))
				->limit(1)
				->get('users');
		if ( $q->num_rows > 0 ){
			return $q->result_array();
		}
		return false;
	}
	public function track($ip, $user, $session_id, $user_agent){
		$data = array(
		'user_name' => $user,
		'ipaddress' => $ip,
		'session_id' => $session_id,
		'user_agent' => $user_agent
		);
		$this->db->insert('tbl_tracker', $data);
	}
	public function getDetails($user_name){
		//query credentials against the database
		$q = $this->db
				->where('username', $user_name)
				->limit(1)
				->get('users');
		if ( $q->num_rows > 0 ){
			return $q->result_array();
		}
		return false;
	}
	public function getNewsletter(){
		$q = $this->db
				->get('newsletter');
		if($q->num_rows > 0){
			$row = $q->last_row('array');
			return $row;
		}
	}
	public function getBets(){
		$q = $this->db
				->get('bets');
		if($q->num_rows > 0){
			$row = $q->last_row('array');
			return $row;
		}
	}
}
?>