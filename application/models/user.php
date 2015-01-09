<?php
class User extends CI_Model {
 
	var $username = '';
    var $password = '';
	var $name = '';
	var $role_id = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function getData() {
		//Query the users table for every record and row
		$query = $this->db->query('SELECT * FROM users ORDER BY name ASC');
		 
		if ($query->num_rows() <= 0) {
			//show_error('Database is empty!');
		} else {
			return $query->result();
		}
    }
	
    function getSingleData($id) {
		//Query the users table for single record
		$query = $this->db->get_where('users', array('id' => $id));
		 
		if ($query->num_rows() <= 0) {
			show_error('Invalid user!');
		} else {
			return $query->row();
		}
    }
	
	function insertData($data, $roleId = 0) {
		$this->username = $data['username'];
        $this->password = $data['password'];
		$this->name = $data['name'];
		$this->role_id = $roleId;

        return $this->db->insert('users', $this);
	}

	function updateData($id, $data) {
		$this->username = $data['username'];
        $this->password = $data['password'];
		$this->name = $data['name'];

		return $this->db->update('users', $this, array('id' => $id));
	}	
 
}
?>