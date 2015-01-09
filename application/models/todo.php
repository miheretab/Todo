<?php
class Todo extends CI_Model {
 
	var $title = '';
    var $text = '';
	var $todo_date = '';
	var $user_id = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function getData($userId) {
		//Query the todos table for every record and row
		$query = $this->db->query('SELECT * FROM todos WHERE user_id = "' . $userId . '" AND completed = 0 ORDER BY todo_date ASC, title ASC');
		 
		if ($query->num_rows() <= 0) {
			//show_error('Database is empty!');
		} else {
			return $query->result();
		}
    }

    function getCompleted($userId) {
		//Query the todos table for every record and row
		$query = $this->db->query('SELECT * FROM todos WHERE user_id = "' . $userId . '" AND completed = 1 ORDER BY todo_date ASC, title ASC');
		 
		if ($query->num_rows() <= 0) {
			//show_error('Database is empty!');
		} else {
			return $query->result();
		}
    }
	
    function getSingleData($id) {
		//Query the todos table for single record
		$query = $this->db->get_where('todos', array('id' => $id));
		 
		if ($query->num_rows() <= 0) {
			show_error('Invalid todo!');
		} else {
			return $query->row();
		}
    }
	
	function insertData($data) {
		$this->title = $data['title'];
        $this->text = $data['text'];
		$this->todo_date = $data['todo_date'];
		$this->user_id = $data['user_id'];

        return $this->db->insert('todos', $this);
	}

	function updateData($id, $data) {
		$todo['title'] = $data['title'];
        $todo['text'] = $data['text'];
		$todo['todo_date'] = $data['todo_date'];
		
		return $this->db->update('todos', $todo, array('id' => $id));
	}

	function complete($id) {
		$this->db->update('todos', array('completed' => 1), array('id' => $id));	
	}
 
}
?>