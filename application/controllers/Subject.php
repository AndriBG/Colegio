<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SubjectModel');
	}

	public function index()
	{
		$Courses = $this->CourseModel->get();

		$data = array(
			"Courses" => $Courses
		);

		$this->load->view("layout/header");
		$this->load->view("subject", $data);
		$this->load->view("layout/footer");
	}

	public function subjectSave()
	{
		$id_course = $this->input->post('id_course');
		$subject = $this->input->post('subject');
		$credit = $this->input->post('credit');
		$schedule = $this->input->post('schedule');

		if ($this->input->is_ajax_request()) {

			$this->SubjectModel->insert($id_course,$subject,$credit,$schedule);

			$data["status"] = "Materia Agregada";

			echo json_encode($data);
		}
	}

	public function subjectLoad()
	{
		if ($this->input->is_ajax_request()) {

			$data = $this->SubjectModel->get();

			echo json_encode($data);
		}
	}

	public function subjectUpdate()
	{
		if ($this->input->is_ajax_request()) {
			
			$id_course = $this->input->post('id_course');
			$subject = $this->input->post('subject');
			$credit = $this->input->post('credit');
			$schedule = $this->input->post('schedule');
			$id = $this->input->post('id');

			$this->SubjectModel->update($id, $id_course, $subject, $credit, $schedule);

			$data["status"] = "Materia actualizada";

			echo json_encode($data);
		}
	}

	public function subjectDelete()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('id');

			$this->SubjectModel->delete($id);

			$data["status"] = "Materia eliminada";

			echo json_encode($data);
		}
	}
}
