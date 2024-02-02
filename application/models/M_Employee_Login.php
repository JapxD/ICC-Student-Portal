<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Employee_Login extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchEmployeeId($employee_number, $password){
        
        $this->db->select('employee_user.employee_id');
        $this->db->select('employee_user.access_role_id');
        $this->db->from('employee_user');
        $this->db->join('employee', 'employee_user.employee_id = employee.employee_id', 'left');
        $this->db->where('employee.employee_number', $employee_number);
        $this->db->where('employee_user.password', $password);
        $result = $this->db->get();

        return $result->result_array()[0];
    }

}