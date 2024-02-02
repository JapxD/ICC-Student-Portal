<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Login extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchStudentId($student_number, $password){
        
        $this->db->select('students.student_id');
        $this->db->from('student_user');
        $this->db->join('students', 'student_user.student_id = students.student_id');
        $this->db->where('students.student_number', $student_number);
        $this->db->where('student_user.password', $password);
        $result = $this->db->get();

        return $result->result_array()[0]['student_id'];
    }

}