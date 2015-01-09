<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
     
    function __construct() {
        parent::__construct();
         
        if(!$this->authenticator->is_logged_in()) {
            $this->authenticator->set_current_url($this->config->site_url($this->uri->uri_string()));
            redirect('users/login');
        }
         
        if(!$this->authenticator->is_admin()) {
            redirect('users/access_denied');
        }
    }
     
    public function index() {
		$this->load->model('user');
		$this->load->helper('url');
		$data['result'] = $this->user->getData();
		
        $this->load->view('admin/index', $data);
    }
}