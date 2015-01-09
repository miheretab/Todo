<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
	
    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->model('user');
		$this->load->helper(array('url', 'form'));
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');			
    }
     
    public function login() {
     
        if($this->authenticator->is_logged_in()) {
            if($this->authenticator->is_admin()) {
                redirect('admin/index');
            }
        }
         
        if($this->authenticator->login($this->input->post('username'), $this->input->post('password'))) {
            $redirect_url = $this->authenticator->get_current_url();
            $this->authenticator->set_current_url('');

            if($redirect_url != '') {
                redirect($redirect_url);
            } else {
                if($this->authenticator->is_admin()) {
                    redirect('admin/index');
                } else {
					redirect('/');
				}
            }
        }
         
        $this->load->view('users/login');
    }
     
    public function logout() {
        $this->authenticator->logout();
        redirect('users/login');
    }
	
	function profile() {
	
		if(!$this->authenticator->is_logged_in()) {
			redirect('users/access_denied');			
		}

		$id = $this->session->userdata('id');
		$data['row'] = $this->user->getSingleData($id);
		
		if(!empty($this->input->post())) {
		
			if ($this->form_validation->run()) {
				$user = $this->input->post();
				$user['password'] = $user['password'] == '' ? $data['row']->password : sha1($user['password']);
				if($this->user->updateData($id, $user)) {
					$this->session->set_flashdata('message', 'The profile is updated.');
					redirect('users/profile');
				} else {
					$this->session->set_flashdata('message', 'The profile couldn\'t be updated.');
				}
			}
		}		

		$this->load->view('users/profile',$data);
	}	
	
	function register() {		
		if(!empty($this->input->post())) {

			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run()) {
				$user = $this->input->post();
				$user['password'] = sha1($user['password']);
				if($this->user->insertData($user)) {
					$this->session->set_flashdata('message', 'The user is registered.');
					redirect('users/login');
				} else {
					$this->session->set_flashdata('message', 'The user couldn\'t be registered.');
				}
			}
		}

		$this->load->view('users/register');
	}	
     
    public function access_denied() {
        $this->load->view('users/access_denied');
    }
}