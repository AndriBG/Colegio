<?php

defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		return $this->db->get('estudiante')->result();
	}

	public function insert($id_course, $f_name, $l_name, $address)
	{
		$data = array(
			"id_curso" => $id_course,
			"nombre" => $f_name,
			"apellido" => $l_name,
			"direccion" => $address,
			"created_at" => date('Y/n/j g:i:s')
		);

		$this->db->insert('estudiante', $data);
	}

	public function update($id, $id_course, $f_name, $l_name, $address)
	{
		$data = array(
			"id_curso" => $id_course,
			"nombre" => $f_name,
			"apellido" => $l_name,
			"direccion" => $address,
			"updated_at" => date('Y/n/j g:i:s'),
		);

		$this->db->update('estudiante', $data, array('id' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('estudiante',"id = $id");
	}
}
