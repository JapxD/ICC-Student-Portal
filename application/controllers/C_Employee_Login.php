<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Employee_Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(!empty($_SESSION['student_id'])){
            redirect('/C_Student_Dashboard/index');
        }elseif(!empty($_SESSION['employee_id'])){
            if($_SESSION['access_role_id'] == TEACHER_ACCESS){
                redirect('/C_Teacher_Dashboard/index');
            }if($_SESSION['access_role_id'] == REGISTRAR_ACCESS){
                redirect('/C_Registrar_Dashboard/index');
            }if($_SESSION['access_role_id'] == MIS_ACCESS){
                redirect('/C_MIS_Dashboard/index');
            }if($_SESSION['access_role_id'] == PROGRAM_HEAD_ACCESS){
                redirect('/C_Program_Dashboard/index');
            }
        }

        $this->load->model('M_Employee_Login');
    }


	public function index()
	{
        $message = $this->session->flashdata('message');
        if(!empty($message)){
            $data = array(
                'message' => $message
            );
            $this->load->view('V_Employee_Login', $data);
        } else {
            $this->load->view('V_Employee_Login');
        }

	}

	public function employeeLogin()
	{
        $employee_number = $this->input->post('employee_number');
        $password = md5($this->input->post('password'));

        $employee_info = $this->M_Employee_Login->fetchEmployeeId($employee_number, $password);

        if(!empty($employee_info)){
            $_SESSION['employee_id'] = $employee_info['employee_id'];
            $_SESSION['access_role_id'] = $employee_info['access_role_id'];
            if($employee_info['access_role_id'] == TEACHER_ACCESS){
                redirect('C_Teacher_Dashboard/index');
            }else if($employee_info['access_role_id'] == REGISTRAR_ACCESS){
                redirect('C_Registrar_Dashboard/index');
            }else if($employee_info['access_role_id'] == MIS_ACCESS){
                redirect('C_MIS_Dashboard/index');
            }else if($employee_info['access_role_id'] == PROGRAM_HEAD_ACCESS){
                redirect('C_Program_Dashboard/index');
            }
        } else{
            $this->session->set_flashdata('message','Incorrect login and password');
            redirect('C_Employee_Login/index'); 
        }
	}
}