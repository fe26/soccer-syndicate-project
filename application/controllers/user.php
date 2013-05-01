<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->library('session');

	}
	public function index()
	{
		if(isset($_SESSION['user_name'])){
			redirect('welcome');
		}
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[6]');
		$this->form_validation->set_rules('pass_word', 'Password', 'required|min_length[4]');
		
		if($this->form_validation->run() !== false){
			$this->load->model('user_model');
			$res = $this
					->user_model
					->verify_user($this->input->post('user_name'), $this->input->post('pass_word'));
			//Form information is valid. Get DB
			if ($res !== false){
				$query['data'] = $this->user_model->getDetails($this->input->post('user_name'));
				//store users IP Address for tracking purposes
				$user_session = $this->session->all_userdata();
				//data from all_userdata()
				$ipaddr = $user_session['ip_address'];
				$session_id = $user_session['session_id'];
				$user_agent = $user_session['user_agent'];
				//user name taken from login
				$username = $this->input->post('user_name');
				//$this->user_model->track($ipaddr, $username, $session_id, $user_agent);
				//create session and redirect to the video
				$query['username'] = $this->input->post('user_name');	
				$datestring = "%D - %M %d %Y";
				$time = time();
				$query['local'] = mdate($datestring, $time);

				//Syndicate Newsletter
				$newsprocess = $this->user_model->getNewsletter();
				$query['newsTitle'] = $newsprocess['title'];
				$query['newsContent'] = $newsprocess['content'];
				$this->load->view('newsletter_view', $query);
			} else {
				$this->load->view('login_view');
			}
		} else {
			$this->load->view('login_view');
		}
	}
	public function bets(){
		/*if (!isset($_SESSION['session_id'])){
			redirect('user');
		}*/
		$this->load->model('user_model');
		$bet = $this->user_model->getBets();
		$query['betContent'] = $bet['bet_content'];
		$this->load->view('bets_view', $query);
	}
	public function workings(){
		/*if (!isset($_SESSION['session_id'])){
			redirect('user');
		}*/
		$this->load->view('workings_view');
	}
	public function contact(){
		/*if (!isset($_SESSION['session_id'])){
			redirect('user');
		}*/
		$this->load->view('contact_view');
	}
	public function newsletter(){
		/*if (!isset($_SESSION['session_id'])){
			redirect('user');
		}*/
		$this->load->model('user_model');
		$newsprocess = $this->user_model->getNewsletter();
		$query['newsTitle'] = $newsprocess['title'];
		$query['newsContent'] = $newsprocess['content'];
		$this->load->view('newsletter_view', $query);
	}
	public function logout(){
		//destroy PHP session
		unset($_SESSION['user_name']);
		//destroy codeigniter session
		$this->session->sess_destroy();
		//return the user to the login page.
		$this->load->view('login_view');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */