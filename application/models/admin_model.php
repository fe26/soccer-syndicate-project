<?php
class admin_model extends CI_Model{

	function __construct(){
	
	}
	public function verify_user($user_name, $pass_word){
		//query credentials against the database
		$q = $this->db
				->where('username', $user_name)
				->where('password', sha1($pass_word))
				->limit(1)
				->get('admin');
		
		if ( $q->num_rows > 0 ){
			return $q->row();
		}
		return false;
	}
	public function add_user($fname, $lname, $uname, $email, $pwd){
		$this->load->helper('date');
		$data = array(
			'email' => $email,
			'fname' => $fname,
			'lname' => $lname,
			'username' => $uname,
			'password' => sha1($pwd)
		);
		$add = $this->db->insert('users', $data); 
		if ($add !== false){
			return true;
		} else {
			return false;
		}
	}
	//get list of users
	public function getUsers(){
		$query = $this->db
						->get('users');
		if ($query->num_rows > 0){			
			return $query->result_array();
		} else {
			return false;
		}
	}
	//get tracking information
	/*public function getUsage(){
		$query = $this->db
						->get('tbl_tracker');
		if ($query->num_rows > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}*/
	//get list to edit
	public function editUsers(){
		$query = $this->db
						->get('users');
		if ($query->num_rows > 0){
			return $query->result_array();
		} else {
			return false;
		}
	}
	//get user by id
	public function getUserByID($id){
		$q = $this->db
				->where('id', $id)
				->limit(1)
				->get('users');
		
		if ( $q->num_rows > 0 ){
			return $q->result_array();
		}
		return false;
	}
	//get current bets
	public function getBets(){
		$q = $this->db
				->get('bets');
		if($q->num_rows > 0){
			$row = $q->last_row('array');
			return $row;
		}
	}
	//get current newsletter
	public function getNewsletter(){
		$q = $this->db
				->get('newsletter');
		if($q->num_rows > 0){
			$row = $q->last_row('array');
			return $row;
		}
	}
	//make the edit
	public function doEdit($id, $fname, $lname, $uname, $email, $pwd){
		$data = array(
			'fname' => $fname,
			'lname' => $lname,
			'username' => $uname,
			'email' => $email,
			'password' => sha1($pwd)
		);
		$this->db->where('id', $id);
		$edit = $this->db->update('users', $data); 
		if ($edit !== false){
			return true;
		} else {
			return false;
		}
	}
	public function delete($id){
		$this->db->where('id', $id);
		$del = $this->db->delete('users');
		if($del !== false){
			return true;
		} else {
			return false;
		}
	}
	public function add_newsletter($title, $content){
		$this->load->helper('date');
		$data = array(
			'title' => $title,
			'content' => $content,
			'timestamp' => now()
		);
		$add = $this->db->insert('newsletter', $data); 
		if ($add !== false){
			return true;
		} else {
			return false;
		}
	}
	public function add_bets($content){
		$this->load->helper('date');
		$data = array(
			'bet_content' => $content,
			'timestamp' => now()
		);
		$add = $this->db->insert('bets', $data); 
		if ($add !== false){
			return true;
		} else {
			return false;
		}
	}
	
	/*public function autoDelete()
	{
		//delete user if they are over 14 days in the system
		$q = $this->db->get('tbl_users');
		$this->load->helper('date');
		foreach($q->result() as $row){
			$datecreated = $row->date_created;
			$start = unix_to_human($datecreated, TRUE, 'eu');
			$end = unix_to_human(time(), TRUE, 'eu');
			$date1 = new DateTime($start);
			$date2 = new DateTime($end);
			//$res = date_diff($date2, $date1);
			$difference = $date2->format('U') - $date1->format('U');
			$time_diff = date('d', $difference);
			$val = (int)$time_diff;
			if($val > 14){
			//add to archive table then delete from active table
			$data = array(
				'first_name' => $row->first_name,
				'last_name' => $row->last_name,
				'user_name' => $row->user_name,
				'phone' => $row->phone,
				'address' => $row->address,
				'email' => $row->email_address,
				'date_created' => $row->date_created
			);
			$add = $this->db->insert('tbl_oldusers', $data);
				if ($add !== false){
					$id = $row->id;
					$this->db->where('id', $id);
					$this->db->delete('tbl_users');
				} else {
					echo 'Could not Auto Update'; 
				}
			}
		}
	}*/
}
?>