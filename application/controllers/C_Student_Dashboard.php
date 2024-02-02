<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MIS_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        if(empty($_SESSION['employee_id'])){
            redirect('C_Employee_Login');
        }
        
        $this->load->model('M_MIS_Dashboard'); 

    }

    public function index(){
        
        $employee_id = $this->session->userdata('employee_id');
        $MIS_info = $this->M_MIS_Dashboard->fetchMISInfo($employee_id); 
        
        $data = array( 
            'MIS_info' => $MIS_info
        );
		$this->load->view('V_MIS_Dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('employee_id');
        redirect($_SERVER['REQUEST_URI'], 'refresh'); 
    }

    public function imageUpload(){
        $student_id = $this->session->userdata('student_id');
        $img_name = $_FILES['profile_pic']['name'];
        $tmp_name = $_FILES['profile_pic']['tmp_name'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);
        $new_img_name = $student_id.'.'.$img_ex_to_lc;
        $img_upload_path = 'images/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        // $new_img_name = $_FILES['profile_pic']['tmp_name'];

        $this->C_Student_Dashboard->imageUpload($student_id,$new_img_name);
        redirect(['C_Student_Dashboard/index']);
    }

}