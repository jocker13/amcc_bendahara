<?php

// session_start(); //we need to start session in order to access it through CI

Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
	}

// Show login page
	public function index() {
		$this->load->view('login');
	}



// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('nim', 'nim', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('home');
			}else{
				$this->load->view('login');
			}
		} else {
			$data = array(
				'nim' => $this->input->post('nim'),
				'password' => md5($this->input->post('password'))
			);
			$result = $this->login_model->login($data);
			
			if ($result == TRUE) {

				$username = $this->input->post('nim');
				$result = $this->login_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'id_users' => $result[0]->id_users,
						'nim' => $result[0]->nim,
						'email' => $result[0]->email,
						'nama' => $result[0]->nama,
						'level'	=> $result[0]->jabatan
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$data = array(
						"container" => "home"
					);

					$this->load->view("template", $data);
				}
			} else {
				$data = array(
					'error_message' => 'Invalid nim or Password'
				);
				$this->load->view('login', $data);
			}
		}
	}

	public function logout() {
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		// $data['message_display'] = 'Successfully Logout';
		$this->load->view('login');
	}

}


