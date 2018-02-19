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

// Show registration page
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

// Validate and store registration data in database
	public function new_user_registration() {

// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {
			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('registration_form', $data);
			}
		}
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
				'password' => $this->input->post('password')
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


