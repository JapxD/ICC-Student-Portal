<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Student_Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if(empty($_SESSION['student_id'])){
            redirect('C_Student_Login');
        }

        $this->load->model('M_Student_Dashboard'); 
    }

    public function index(){
        $student_id = $this->session->userdata('student_id');
        $student_info = $this->M_Student_Dashboard->fetchStudentInfo($student_id);
        $sem1 = $this->M_Student_Dashboard->fetchSem1($student_id);
        $sem2 = $this->M_Student_Dashboard->fetchSem2($student_id);


        $data = array( 
            'student_info' => $student_info,
            'sem1'=> $sem1,
            'sem2'=> $sem2
        );
		$this->load->view('V_Student_Dashboard', $data);
    }

    public function logout(){
        $this->session->unset_userdata('student_id');
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