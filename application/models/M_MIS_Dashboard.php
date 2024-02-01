<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MIS_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct(); 
    }
    
    public function fetchMISInfo($employee_id){ 
        $this->db->select('first_name'); 
        $this->db->select('last_name');
        $this->db->select('role');
        $this->db->select('profile_name');
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id); 
        return $this->db->get()->result_array()[0]; 
    } 
    
}