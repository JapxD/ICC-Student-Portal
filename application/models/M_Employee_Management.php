<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Employee_Management extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchEmployee(){
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('employee_number');
        $this->db->select('employee_id');
        $this->db->from('employee');
        return $this->db->get()->result_array();   
    }
    
    public function fetchAccessRoles(){
        $this->db->select('access_role_id');
        $this->db->select('access_role_name'); 
        $this->db->from('access_role');
        return $this->db->get()->result_array();
    }

    public function employeeCreate($employee_id, $access_role_id, $password,$employee_number,$first_name,$middle_name,$last_name)
    {
        
        $data = array(
            'employee_id' => $employee_id,
            'access_role_id' => $access_role_id,
            'password' => $password

        );
        $data1 = array(
            'employee_number' => $employee_number,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name
        );
        $this->db->insert('employee_user', $data);
        $this->db->insert('employee', $data1);
    }
}