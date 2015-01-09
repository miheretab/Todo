<?php
class Helloworld_model extends CI_Model {
 
	var $title = '';
    var $text = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function getData() {
		//Query the data table for every record and row
		$query = $this->db->query('SELECT * FROM data ORDER BY title ASC');
		 
		if ($query->num_rows() <= 0) {
			//show_error('Database is empty!');
		} else {
			return $query->result();
		}
    }
	
    function getSingleData($id) {
		//Query the data table for single record
		$query = $this->db->get_where('data', array('id' => $id));
		 
		if ($query->num_rows() <= 0) {
			show_error('Invalid data!');
		} else {
			return $query->row();
		}
    }
	
	function insertData($data) {
		$this->title = $data['title'];
        $this->text = $data['text'];

        return $this->db->insert('data', $this);
	}

	function updateData($id, $data) {
		$this->title = $data['title'];
        $this->text = $data['text'];

		return $this->db->update('data', $this, array('id' => $id));
	}	
 
}
?>