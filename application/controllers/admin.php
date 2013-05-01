<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->library('session');
	}
	public function index()
	{
		if(isset($_SESSION['admin'])){
			redirect('admin/dashboard');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'Username', 'required|min_length[2]');
		$this->form_validation->set_rules('pass_word', 'Password', 'required|min_length[4]');
		
		if($this->form_validation->run() !== false){
			$this->load->model('admin_model');
			$res = $this
					->admin_model
					->verify_user($this->input->post('user_name'), $this->input->post('pass_word'));
			if ($res !== false){
				$_SESSION['admin'] = $this->input->post('user_name');
				//delete old users on login
				$this->load->helper('date');
				redirect('admin/dashboard');
			}
		}
		//load admin login
		$this->load->view('admin_view');
	}
	public function dashboard(){
		if (isset($_SESSION['admin'])){
			$this->load->view('dashboard_view');
		}
	}
	//Screen for Bets
	public function bets(){
		if (isset($_SESSION['admin'])){
			$this->load->model('admin_model');
			$res = $this->admin_model->getBets();
			if($res != null){
				$query['bets'] = $res['bet_content'];
			}
			$this->load->view('adminbets_view', $query);
		}
	}
	//Add Bets
	public function addbets(){
		if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->model('admin_model');
		$add = $this->admin_model
							->add_bets($this->input->post('content'));
			if($add !== false){
				$res = $this->admin_model->getBets();
				if($res != null){
					$data['bets'] = $res['bet_content'];
				}
				$data['success'] = 'Bets Added';
				$this->load->view('adminbets_view', $data);
			} else {
				$res = $this->admin_model->getBets();
				if($res != null){
					$data['bets'] = $res['bet_content'];
				}
				$data['error'] = 'Entry Failed';
				$this->load->view('adminbets_view', $data);
			}
	}
	//Screen for Newsletter
	public function newsletter(){
		if (isset($_SESSION['admin'])){
			$this->load->model('admin_model');
			$res = $this->admin_model->getNewsletter();
			if($res != null){
				$query['title'] = $res['title'];	
				$query['content'] = $res['content'];
			}
			$this->load->view('adminnewsletter_view', $query);
		}
	}
	public function addnewsletter(){
			if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->model('admin_model');
		$add = $this->admin_model
							->add_newsletter($this->input->post('title'),
							$this->input->post('content'));
			if($add !== false){
				$res = $this->admin_model->getNewsletter();
				if($res != null){
					$data['title'] = $res['title'];	
					$data['content'] = $res['content'];
				}
				$data['success'] = 'Newletter Added';
				$this->load->view('adminnewsletter_view', $data);
			} else {
				$res = $this->admin_model->getNewsletter();
				if($res != null){
					$data['title'] = $res['title'];	
					$data['content'] = $res['content'];
				}
				$data['error'] = 'Entry Failed';
				$this->load->view('adminnewsletter_view', $data);
			}
	}
	//TRACK VISITORS FOR SECURITY
	public function tracker(){
			$this->load->model('admin_model');
			$data['query'] = $this->admin_model->getUsage();
			//if(isset($data)){
			$this->load->view('tracker_view', $data);
	}
	public function add(){
		if(isset($_SESSION['admin'])){
			$this->load->view('add_view');
		}
	}
	public function view(){
		if (isset($_SESSION['admin'])){
			$this->load->model('admin_model');
			$data['query'] = $this->admin_model->getUsers();
			//if(isset($data)){
			$this->load->view('getusers_view', $data);
			//} else {
			//	$error['error'] = "Cannot load information";
			//	$this->load->view('getusers_view', $error);
			//}
		}
	}
	public function edituser(){
		if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->model('admin_model');
		$data['query'] = $this->admin_model->getUserByID($this->uri->segment(3));
		$this->load->view('editform_view', $data);
	}
	public function edit(){
		if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->helper('date');
		$this->load->model('admin_model');
		//$this->admin_model->autoDelete();
		$query['data'] = $this->admin_model->editUsers();	
		if(is_null($query['data'])){
			$query['error'] = "No Value in database";
			$this->load->view('editusers_view', $query);
		} else {
			$query['query'] = $query['data'];
			$this->load->view('editusers_view', $query);
		}
	}
	public function adduser(){
		if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'first name', 'required|min_length[2]');
		$this->form_validation->set_rules('lname', 'last name', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('uname', 'Username', 'required|min_length[2]');
		$this->form_validation->set_rules('pass_word', 'Password', 'required|min_length[4]');
		
		if($this->form_validation->run() !== false){
			$this->load->model('admin_model');
			$add = $this->admin_model
								->add_user($this->input->post('fname'),
								$this->input->post('lname'),
								$this->input->post('uname'),
								$this->input->post('email'),
								$this->input->post('pass_word')
								);
			if($add !== false){
				$data['success'] = 'User Added';
				$this->load->view('add_view', $data);
			} else {
				$data['error'] = 'Entry Failed';
				$this->load->view('add_view', $data);
			}
		}
	}
	public function makeedit(){
		if (!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'first name', 'required|min_length[2]');
		$this->form_validation->set_rules('lname', 'last name', 'required|min_length[2]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('uname', 'Username', 'required|min_length[2]');
		$this->form_validation->set_rules('pass_word', 'Password', 'required|min_length[4]');
		
		if($this->form_validation->run() !== false){
			$this->load->model('admin_model');
			$add = $this->admin_model
								->doEdit(
								$this->input->post('id'),
								$this->input->post('fname'),
								$this->input->post('lname'),
								$this->input->post('uname'),
								$this->input->post('email'),
								$this->input->post('pass_word')
								);
			if($add !== false){
				/*$this->load->library('email');
				if($this->input->post('status') == 'active'){
					$this->email->from('info@.com', 'Colliers Funeral Services');
					$user = $this->admin_model->getUserByID($this->input->post('id'));
					foreach($user as $row)
					{
						$emailTo = $row['email_address'];				
					}
					$this->email->to($emailTo);
					$this->email->bcc('johnjoallen@gmail.com');
					$this->email->subject('Colliers Funeral Services');
					$this->email->message('Your account is now activated your username: ' . $this->input->post('uname') . ' and password: ' . $this->input->post('pass_word') . ' log in at Colliers Funeral Services Website http://www.collierslivefuneralvideoservices.com' );
					$this->email->send();
				} else {
					$this->email->from('info@collierfuneralservices.com', 'Colliers Funeral Services');
					$user = $this->admin_model->getUserByID($this->input->post('id'));
					foreach ($user as $row)
					{
						$emailTo = $row['email_address'];				
					}
					$this->email->to($emailTo);
					$this->email->bcc('johnjoallen@gmail.com');
					$this->email->subject('Colliers Funeral Services');
					$this->email->message('Your account has been disabled');
					$this->email->send();
				}*/
				redirect('admin/edit');
			} else {
				redirect('admin/edit');
			}
		}
	}
	//delete users
	public function delete(){
		if(!isset($_SESSION['admin'])){
			redirect('admin');
		}
		$this->load->model('admin_model');
		$delete = $this->admin_model->delete($this->uri->segment(3));
		if($delete !== false){
			redirect('admin/edit');
		} else {
			redirect('admin/edit');
		}
	}
	public function logout(){
		unset($_SESSION['admin']);
		//return the user to the login page.
		$this->load->view('login_view');
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */