<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Management extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchStudent(){

        
        $result = $this->db->query('
        SELECT first_name,
        last_name,
        student_number,
        students.student_id,
        profile_name
        FROM
        students
        WHERE student_id NOT IN(SELECT student_id from student_user)
        ');
        
        return $result->result_array();  
    }
    
    public function studentCreate($student_id, $password) 
    {
        
        $data = array(
            'student_id' => $student_id,
            'password' => $password

        );
    
        $this->db->insert('student_user', $data);
    }
}