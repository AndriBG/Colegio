<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CourseModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		$query = $this->db->get('curso');
		return $query->result();
	}

	public function insert($name)
	{
		$data = array(
			"nombre_curso" => $name,
			"created_at" => date('Y/n/j g:i:s')
		);

		$this->db->insert('curso', $data);
	}

	public function update($name, $id)
	{
		$data = array(
			"nombre_curso" => $name,
			"updated_at" => date('Y/n/j g:i:s'),
		 	// "created_at" => null
		);

		$this->db->update('curso', $data, array('id_curso' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('curso',"id_curso = $id");
	}
}
