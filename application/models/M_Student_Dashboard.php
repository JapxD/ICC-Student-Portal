<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Student_Dashboard extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function fetchSem1($student_id){
        $this->db->select('CONCAT(subject.subject_code, " - ", subject.subject_name) AS subject_name');
        $this->db->select('CONCAT(employee.first_name, " ", employee.last_name) AS employee_name');
        $this->db->select('subject.subject_name');
        $this->db->select('students_schedule.final_grade');
        $this->db->select('subject.subject_code');
        $this->db->select('subject.subject_name');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.room_remarks');
        $this->db->select('curriculum.year_level');
        $this->db->select('curriculum.semester');
        $this->db->select('students_schedule.grade');
        $this->db->select('students_schedule.prelim_grade');
        $this->db->select('students_schedule.midterm_grade');
        $this->db->select('grade_remarks.grade_remarks_name');
        $this->db->from('students');
        $this->db->join('course','students.course_id = course.course_id','left');
        $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
        $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
        $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->join('grade_remarks','students_schedule.grade_remarks_id = grade_remarks.grade_remarks_id','left');
        //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->where('students.student_id', $student_id);
        $this->db->where('curriculum.semester',1);
        $this->db->where('curriculum.year_level', 1);
        
        return $this->db->get()->result_array();
    }

    public function fetchSem2($student_id){
        $this->db->select('CONCAT(subject.subject_code, " - ", subject.subject_name) AS subject_name');
        $this->db->select('CONCAT(employee.first_name, " ", employee.last_name) AS employee_name');
        $this->db->select('subject.subject_name');
        $this->db->select('students_schedule.final_grade');
        $this->db->select('subject.subject_code');
        $this->db->select('subject.subject_name');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.room_remarks');
        $this->db->select('curriculum.year_level');
        $this->db->select('curriculum.semester');
        $this->db->select('students_schedule.grade');
        $this->db->select('students_schedule.prelim_grade');
        $this->db->select('students_schedule.midterm_grade');
        $this->db->select('grade_remarks.grade_remarks_name');
        $this->db->from('students');
        $this->db->join('course','students.course_id = course.course_id','left');
        $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
        $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
        $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->join('grade_remarks','students_schedule.grade_remarks_id = grade_remarks.grade_remarks_id','left');
        //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->where('students.student_id', $student_id);
        $this->db->where('curriculum.semester',2);
        $this->db->where('curriculum.year_level', 1);
        return $this->db->get()->result_array();
    }
    
    public function fetchStudentInfo($student_id){  
        $this->db->select('course_name');
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->from('students');
        $this->db->where('student_id', $student_id);
        $this->db->join('course','students.course_id = course.course_id','left');
        return $this->db->get()->result_array()[0]; 
    }
    public function studentLoginCreate($student_id, $password)
    {
        
        $data = array(
            'student_id' => $student_id,
            'password' => $password

        );
    
        $this->db->insert('student_user', $data);
    }
    public function imageUpload($student_id,$new_img_name){
        $data = array(
            'profile_name' => $new_img_name
        );

        $this->db->where('student_id', $student_id);
        $this->db->update('employee', $data);

        return ($this->db->affected_rows() > 0);
    }
}