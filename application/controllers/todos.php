<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todos extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('todo');
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');	
		$this->form_validation->set_rules('todo_date', 'Date', 'required');
		
		if(!$this->authenticator->is_logged_in()) {
			redirect('users/access_denied');			
		}		
    }
	
	function index() {
		
		$data['result'] = $this->todo->getData($this->session->userdata('id'));
		$data['page_title'] = "Todo List";
			
		$this->load->view('todos/index',$data);
	}
	
	function completed() {
		
		$data['result'] = $this->todo->getCompleted($this->session->userdata('id'));
		$data['page_title'] = "Completed List";
			
		$this->load->view('todos/index',$data);
	}	
	
	function edit($id) {
		
		$data['row'] = $this->todo->getSingleData($id);
		
		if(!empty($this->input->post())) {
		
			if ($this->form_validation->run()) {
				$todo = $this->input->post();
				$todo['user_id'] = $this->session->userdata('id');
				if($this->todo->updateData($id, $todo)) {
					$this->session->set_flashdata('message', 'The content is updated.');
					redirect('todos/index');
				} else {
					$this->session->set_flashdata('message', 'The content couldn\'t be updated.');
				}
			}
		}		

		$this->load->view('todos/edit',$data);
	}	
	
	function add() {		
		
		if(!empty($this->input->post())) {

			if ($this->form_validation->run()) {
				$todo = $this->input->post();
				$todo['user_id'] = $this->session->userdata('id');
				if($this->todo->insertData($todo)) {
					$this->session->set_flashdata('message', 'The content is added.');
				} else {
					$this->session->set_flashdata('message', 'The content couldn\'t be added.');
				}
			}
		}

		redirect('todos/index');
	}	
	
	function complete($id) {
		
		if($this->todo->complete($id)) {
			$this->session->set_flashdata('message', 'The todo is completed.');
		} else {
			$this->session->set_flashdata('message', 'The todo couldn\'t be updated.');
		}

		redirect('todos/index');
	}	

}
?>