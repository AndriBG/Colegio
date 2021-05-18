<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('CourseModel');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('curso');
		$this->load->view('layout/footer');
	}

	public function courseSave()
    {
		$name = $this->input->post('curso');

        if( $this->input->is_ajax_request()){

            $this->CourseModel->insert($name);

			$data["status"] = "Curso Agregado";

			echo json_encode($data);
        }
    }

    public function coursesLoad()
    {
		if($this->input->is_ajax_request()){

			$data = $this->CourseModel->get();

			echo json_encode($data);
		}
    }

    public function updateCourse()
	{
        if($this->input->is_ajax_request()){

			$name = $this->input->post('name_course');

			$id = $this->input->post('id');

            $this->CourseModel->update($name,$id);

			$data["status"] = "Curso actualizado";

			echo json_encode($data);
        }
    }

	public function deleteCourse()
	{
		if($this->input->is_ajax_request()){

			$id = $this->input->post('id');

			$this->CourseModel->delete($id);

			$data["status"] = "Curso eliminado";

			echo json_encode($data);
		}	
	}
}
