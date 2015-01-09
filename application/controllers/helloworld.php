<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helloworld extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('helloworld_model');
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('url', 'form'));
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');		
    }
	
	function index() {

		$data['result'] = $this->helloworld_model->getData();
		$data['page_title'] = "CI Hello World App!";
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
			
		$this->load->view('helloworld/index',$data);
	}
	
	function edit($id) {

		$data['row'] = $this->helloworld_model->getSingleData($id);
		
		if(!empty($this->input->post())) {
		
			if ($this->form_validation->run()) {
				if($this->helloworld_model->updateData($id, $this->input->post())) {
					$this->session->set_flashdata('message', 'The content is updated.');
					redirect('helloworld/index');
				} else {
					$this->session->set_flashdata('message', 'The content couldn\'t be updated.');
				}
			}
		}		

		$this->load->view('helloworld/edit',$data);
	}	
	
	function add() {		
		if(!empty($this->input->post())) {

			if ($this->form_validation->run()) {
				if($this->helloworld_model->insertData($this->input->post())) {
					$this->session->set_flashdata('message', 'The content is added.');
				} else {
					$this->session->set_flashdata('message', 'The content couldn\'t be added.');
				}
			}
		}

		redirect('helloworld/index');
	}	
}
?>