<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SubjectModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		return $this->db->get('materia')->result();
	}

	public function insert($id_course,$subject,$credit,$schedule)
	{
		$data = array(
			"id_curso" => $id_course,
			"nombre_materia" => $subject,
			"credito" => $credit,
			"horario" => $schedule,
			"created_at" => date('Y/n/j g:i:s')
		);

		$this->db->insert('materia', $data);
	}

	public function update($id, $id_course, $subject, $credit, $schedule)
	{
		$data = array(
			"id_curso" => $id_course,
			"nombre_materia" => $subject,
			"credito" => $credit,
			"horario" => $schedule,
			"updated_at" => date('Y/n/j g:i:s'),
		);

		$this->db->update('materia', $data, array('id' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('materia',"id = $id");
	}
}
