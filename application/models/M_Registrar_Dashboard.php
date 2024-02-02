<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrar_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function fetchRegistrarInfo($employee_id){   
        $this->db->select('employee.first_name');
        $this->db->select('employee.last_name');
        $this->db->select('employee.profile_name');
        $this->db->select('access_role.access_role_name');
        $this->db->from('employee');
        $this->db->join('employee_user', 'employee.employee_id = employee_user.employee_id');
        $this->db->join('access_role', 'employee_user.access_role_id = access_role.access_role_id');
        $this->db->where('employee.employee_id', $employee_id);
        return $this->db->get()->result_array()[0]; 
    }
    public function fetchStudentInfo($employee_id){
        $this->db->select('students.first_name');
        $this->db->select('students.last_name');
        $this->db->from('students');
        return $this->db->get()->result_array()[0];
    }

    public function saveUploadedExcel($insert_array){
        
        $this->db->select('student_number');
        $this->db->from('students');
        $this->db->where('student_number', $insert_array['student_number']); 

        $student_exists = $this->db->get()->result_array();

        $this->db->select('course_id');
        $this->db->from('course');
        $this->db->where('course_code', $insert_array['course_code']); 
        
        $course_id = $this->db->get()->result_array()[0]['course_id'];

        $insert_array['course_id'] = $course_id;

        unset( $insert_array['course_code'] );

        if($student_exists){ 
            $this->db->where('student_number',$insert_array['student_number']);
            $this->db->update('students',$insert_array);
        }else{
            $this->db->insert('students',$insert_array);
        }
        echo "<p>got it</p>";
    }
    
}