<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Registrar_checklist extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }
    public function fetchStudentGradeList($student_id){
        $this->db->select('CONCAT(subject.subject_code, " - ", subject.subject_name) AS subject_name');
        $this->db->select('CONCAT(employee.first_name, " ", employee.last_name) AS employee_name');
        $this->db->select('subject.subject_code');
        $this->db->select('schedule.schedule_remarks');
        $this->db->select('schedule.room_remarks');
        $this->db->select('students_schedule.year_level');
        $this->db->select('students_schedule.semester');
        $this->db->select('students_schedule.grade');
        $this->db->select('students_schedule.prelim_grade');
        $this->db->select('students_schedule.midterm_grade');
        $this->db->select('students_schedule.final_grade');
        $this->db->select('grade_remarks.grade_remarks_name');
        $this->db->from('students_schedule');
        $this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
        $this->db->join('grade_remarks','students_schedule.grade_remarks_id = grade_remarks.grade_remarks_id','left');
        $this->db->join('employee','schedule.employee_id = employee.employee_id','left');
        $this->db->join('subject','schedule.subject_id = subject.subject_id','left');
        $this->db->where('students_schedule.student_id', $student_id);
        $this->db->order_by('students_schedule.year_level');
        $this->db->order_by('students_schedule.semester');
        return $this->db->get()->result_array();
    }
    
    public function fetchRegistrarInfo($employee_id){
        $this->db->select('first_name');
        $this->db->select('last_name');
        $this->db->select('profile_name');
        $this->db->from('employee');
        $this->db->where('employee_id', $employee_id);
        return $this->db->get()->result_array()[0];
    }
    public function fetchStudentInfo($employee_id){
        $this->db->select('students.student_id');
        $this->db->select('students.first_name');
        $this->db->select('students.last_name');
        $this->db->select('students.year_level');
        $this->db->select('course.course_name');
        $this->db->from('students');
        $this->db->join('course','students.course_id = course.course_id','left');
        return $this->db->get()->result_array();
    }
// --------------------------------------------------------------------------------------------------------
public function fetchStudentInfoo($student_id){
    $this->db->select('students.student_id');
    $this->db->select('students.first_name');
    $this->db->select('students.last_name');
    $this->db->select('students.profile_name'); 
    $this->db->select('students.year_level');
    $this->db->select('course.course_name');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    return $this->db->get()->result_array()[0];
}


public function fetchSubject($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('subject.subject_code');
    $this->db->from('subject');
    return $this->db->get()->result_array();
}

public function fetchFsem1($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 1);
    $this->db->where('curriculum.year_level', 1);
    return $this->db->get()->result_array();
}
public function fetchFsem2($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 2);
    $this->db->where('curriculum.year_level', 1);
    return $this->db->get()->result_array();
}

//-------------------------------------SECOND YEAR----------------------------------------------------

public function fetchSsem1($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 1);
    $this->db->where('curriculum.year_level', 2);
    return $this->db->get()->result_array();
}
public function fetchSsem2($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 2);
    $this->db->where('curriculum.year_level', 2);
    return $this->db->get()->result_array();
}


//-------------------------------------THIRD YEAR----------------------------------------------------

public function fetchTsem1($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 1);
    $this->db->where('curriculum.year_level', 3);
    return $this->db->get()->result_array();
}
public function fetchTsem2($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 2);
    $this->db->where('curriculum.year_level', 3);
    return $this->db->get()->result_array();
}


//-------------------------------------FOURTH YEAR----------------------------------------------------

public function fetchFtsem1($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 1);
    $this->db->where('curriculum.year_level', 4);
    return $this->db->get()->result_array();
}
public function fetchFtsem2($student_id){  
    $this->db->select('subject.subject_name');
    $this->db->select('students_schedule.grade');
    $this->db->select('subject.subject_code');
    $this->db->from('students');
    $this->db->join('course','students.course_id = course.course_id','left');
    $this->db->join('curriculum','course.course_id = curriculum.course_id','left');
    $this->db->join('subject','curriculum.subject_id = subject.subject_id','left');
    $this->db->join('schedule','subject.subject_id = schedule.subject_id','left');
    $this->db->join('students_schedule',' students.student_id  = students_schedule.student_id and students_schedule.schedule_id = schedule.schedule_id','left');
    //$this->db->join('schedule','students_schedule.schedule_id = schedule.schedule_id','left');
    $this->db->where('students.student_id', $student_id);
    $this->db->where('curriculum.semester', 2);
    $this->db->where('curriculum.year_level', 4);
    return $this->db->get()->result_array();
}

// -----------------------------------------------------------------------------




    public function saveUploadedExcel($insert_array){
        
        $this->db->select('student_number');
        $this->db->from('students');
        $this->db->where('student_number', $insert_array['student_number']);

        $result = $this->db->get()->result_array();

        if($result){ 
            $this->db->where('student_number',$insert_array['student_number']);
            $this->db->update('students',$insert_array);
        }else{
            $this->db->insert('students',$insert_array);
        }
        
    }

    
    
}