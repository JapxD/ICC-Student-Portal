<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Program_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        
        $this->load->library('excel');
        $this->load->model('M_Program_Dashboard');

    }

    public function index(){
        redirect('C_Program_Dashboard/sectionList');
    }

    public function sectionList(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $course_section = $this->M_Program_Dashboard->fetchCourseSection($employee_id);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'course_section' => $course_section
        );

		$this->load->view('V_Program_Dashboard', $data);
    }
    public function section(){
        
        $employee_id = $this->session->userdata('employee_id');
        $section_id = $this->input->get('section_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $student_list = $this->M_Program_Dashboard->fetchStudentList($section_id);
        $section_info = $this->M_Program_Dashboard->fetchSectionInfo($section_id);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'student_list' => $student_list,
            'course_section' => $section_info,
            'section_id' => $section_id
        );

		$this->load->view('V_Program_Section', $data);
    }

    public function scheduleList(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $teacher_schedule = $this->M_Program_Dashboard->fetchTeacherSchedule($teacher_schedule_info['course_id']);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,  
            'teacher_schedule' => $teacher_schedule
        );

		$this->load->view('V_Program_ScheduleList', $data);
    }

    public function createSchedule(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $teacher_list = $this->M_Program_Dashboard->fetchTeacherList();
        $subject_list = $this->M_Program_Dashboard->fetchSubjectList($teacher_schedule_info['course_id']);

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'teacher_list' => $teacher_list,
            'subject_list' => $subject_list
        );

		$this->load->view('V_Program_CreateSchedule', $data);
    }

    public function createSection(){
        
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);

        $data = array(
            'teacher_schedule_info' => $teacher_schedule_info
        );

		$this->load->view('V_Program_CreateSection', $data);
    }

    public function createSectionId(){
        
        $section_name = $this->input->post('section_name');
        $year_level = $this->input->post('year_level');
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        
        $this->M_Program_Dashboard->createSection($section_name, $teacher_schedule_info['course_id'], $year_level);

        redirect("/C_Program_Dashboard/sectionList");
    }

    public function schedule(){
        
        $employee_id = $this->session->userdata('employee_id');
        $schedule_id = $this->input->get('schedule_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        $schedule_info = $this->M_Program_Dashboard->fetchScheduleInfo($schedule_id);
        $teacher_student_schedule_list = $this->M_Program_Dashboard->fetchStudentScheduleList($schedule_id);
        $course_section = $this->M_Program_Dashboard->fetchCourseSection($employee_id);
        $grade_remarks_list = $this->M_Program_Dashboard->fetchGradeRemarksList();

        $data = array( 
            'teacher_schedule_info' => $teacher_schedule_info,
            'teacher_student_schedule_list' => $teacher_student_schedule_list,
            'course_section' => $course_section,
            'schedule_info' => $schedule_info,
            'grade_remarks_list' => $grade_remarks_list,
            'schedule_id' => $schedule_id
            
        );

		$this->load->view('V_Program_Schedule', $data);
    }

    public function uploadStudentSection(){

        $section_id = $this->input->post('section_id');
        $objPHPExcel = PHPExcel_IOFactory::load($_FILES['fileToUpload']['tmp_name']);
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
 

        $this->M_Program_Dashboard->emptySection($section_id);

        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
         
            //The header will/should be in row 1 only. of course, this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }

        foreach ($arr_data as $row){
            $insert_array = array(
                'student_number' => $row['A']
            );

            $this->M_Program_Dashboard->saveUploadedExcel($insert_array, $section_id);
        }

        $this->session->set_flashdata('message','Save Successful!');
        redirect("/C_Program_Dashboard/section/?section_id=$section_id");
    
    }

    public function createTeacherSchedule(){

        $teacher_id = $this->input->post('teacher');
        $subject_id = $this->input->post('subject');
        $schedule_remarks = $this->input->post('schedule');
        $room_remarks = $this->input->post('room');
        $year_level = $this->input->post('year_level');
        $semester = $this->input->post('semester');
        $employee_id = $this->session->userdata('employee_id');
        $teacher_schedule_info = $this->M_Program_Dashboard->fetchTeacherInfo($employee_id);
        
        $this->M_Program_Dashboard->createTeacherSchedule($teacher_id, $subject_id, $schedule_remarks, $room_remarks, $teacher_schedule_info['course_id'], $year_level, $semester);

        redirect("/C_Program_Dashboard/scheduleList");
    
    }
    
    public function deleteSchedule(){
        
        $schedule_id = $this->input->get('schedule_id');
        $this->M_Program_Dashboard->deleteSchedule($schedule_id);

        redirect("/C_Program_Dashboard/scheduleList");
    }

    public function deleteSection(){
        
        $section_id = $this->input->get('section_id');
        $this->M_Program_Dashboard->deleteSection($section_id);

        redirect("/C_Program_Dashboard/sectionList");
    }
    
    public function deleteStudentSchedule(){
        
        $student_schedule_id = $this->input->get('student_schedule_id');
        $schedule_id = $this->input->get('schedule_id');
      
        $this->M_Program_Dashboard->deleteStudentScheduleSingle($student_schedule_id);

        redirect("/C_Program_Dashboard/schedule/?schedule_id=$schedule_id");
    }
    
    public function addSection(){

        $schedule_id = $this->input->post('schedule_id');
        $section_id = $this->input->post('section_id');
        
        $schedule_info = $this->M_Program_Dashboard->fetchScheduleInfo($schedule_id);
        
        $this->M_Program_Dashboard->deleteStudentSchedule($schedule_id);

        $this->M_Program_Dashboard->updateScheduleSection($schedule_id, $section_id);
        $this->M_Program_Dashboard->createStudentScheduleBySection($schedule_id, $schedule_info['year_level'], $schedule_info['semester'], $section_id);

        redirect("/C_Program_Dashboard/schedule/?schedule_id=$schedule_id");
    
    }
    
    public function addStudentSchedule(){

        $schedule_id = $this->input->post('schedule_id');
        $student_number = $this->input->post('student_number');
        
        $schedule_info = $this->M_Program_Dashboard->fetchScheduleInfo($schedule_id);

        $this->M_Program_Dashboard->createStudentScheduleByStudent($schedule_id, $schedule_info['year_level'], $schedule_info['semester'], $student_number);

        redirect("/C_Program_Dashboard/schedule/?schedule_id=$schedule_id");
    
    }
    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }
    
}