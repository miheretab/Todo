<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authenticator {
 
    function Authenticator() {
        $CI =& get_instance();
        //  load libraries
        $CI->load->database();
        $CI->load->library("session");
        $CI->load->library('user_agent');
    }
     
    function login($username, $password){
        $CI =& get_instance();
         
        $data = array(
            "username" => $username,
            "password" => sha1($password));
 
        $query = $CI->db->get_where("users", $data);
        if($query->num_rows() != 1) {
            //  their username and password combination were not found in the databse
            return false;
        } else {
            $role = 'USER';
            if($query->row()->role_id == 1) {
                $role = 'ADMIN';
            }
             
            //  store user id in the session
            $CI->session->set_userdata("id", $query->row()->id);
            $CI->session->set_userdata("username", $query->row()->username);
            $CI->session->set_userdata("role", $role);
            return true;
        }
    }
     
    function logout(){
        $CI =& get_instance();
        $CI->session->unset_userdata("username");
    }
     
    function is_logged_in() {
     
        $CI =& get_instance();
        return ($CI->session->userdata("username") != '') ? true : false;
    }
     
    function is_admin() {
        $CI =& get_instance();
        return ($CI->session->userdata("role") == 'ADMIN') ? true : false;
    }
     
    function get_userdata() {
        $CI =& get_instance();
        if(!$this->is_logged_in()) {
            return false;
        } else {
            $query = $CI->db->get_where("users", array("id" => $CI->session->userdata("id")));
            return $query->row();
        }
    }
 
    function set_current_url($url) {
        $CI =& get_instance();
        $CI->session->set_userdata("current_url", $url);
    }
     
    function get_current_url() {
        $CI =& get_instance();
        return $CI->session->userdata("current_url");
    }
     
}