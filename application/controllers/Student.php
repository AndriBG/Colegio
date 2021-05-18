<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('StudentModel');
	}

	public function index()
	{
		$Courses = $this->CourseModel->get();

		$data = array(
			"Courses" => $Courses
		);

		$this->load->view("layout/header");
		$this->load->view("student", $data);
		$this->load->view("layout/footer");
	}

	public function studentSave()
	{
		$id_course = $this->input->post('id_course');
		$f_name = $this->input->post('f_name');
		$l_name = $this->input->post('l_name');
		$address = $this->input->post('address');

		if ($this->input->is_ajax_request()) {

			$this->StudentModel->insert($id_course, $f_name, $l_name, $address);

			$data["status"] = "Estudiante Agregado";

			echo json_encode($data);
		}
	}

	public function studentLoad()
	{
		if ($this->input->is_ajax_request()) {

			$Students = $this->StudentModel->get();

			echo json_encode($Students);
		}
	}

	public function studentUpdate()
	{
		if ($this->input->is_ajax_request()) {
			
			$id_course = $this->input->post('id_course');
			$f_name = $this->input->post('f_name');
			$l_name = $this->input->post('l_name');
			$address = $this->input->post('address');
			$id = $this->input->post('id');

			$this->StudentModel->update($id, $id_course, $f_name, $l_name, $address);

			$data["status"] = "Estudiante actualizado";

			echo json_encode($data);
		}
	}

	public function studentDelete()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('id');

			$this->StudentModel->delete($id);

			$data["status"] = "Estudiante eliminado";

			echo json_encode($data);
		}
	}
}
