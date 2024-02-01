<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Employee_Management extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Employee_Management'); 
    }

	public function index()
	{
        $employee_list = $this->M_Employee_Management->fetchEmployee();
        $access_role_list = $this->M_Employee_Management->fetchAccessRoles();  
        
        $data = array(
            'employee_list'=> $employee_list,
            'access_role_list'=> $access_role_list 
        );

		$this->load->view('V_Employee_Create', $data);
	}

	public function employeeCreate()
	{
        $employee_id = $this->input->post('employee_id');
        $access_role_id = $this->input->post('access_role_id');
        $password = md5($this->input->post('password'));

        $employee_number = $this->input->post('employee_number');
        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');

        $this->M_Employee_Management->employeeCreate($employee_id, $access_role_id, $password,$employee_number,$first_name,$middle_name,$last_name);
	}
}