<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ProgramHead_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
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
}
