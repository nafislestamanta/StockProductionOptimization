<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Material');
	}

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/material/index');
		$this->load->view('partials/footer');
		$this->load->view('master/material/script');
	}

	public function create()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/material/form');
		$this->load->view('partials/footer');
		$this->load->view('master/material/script');
	}

	public function edit()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/material/form');
		$this->load->view('partials/footer');
		$this->load->view('master/material/script');
	}

	public function getData()
	{
		echo json_encode($this->M_Material->getData());
	}

	public function getDataByID()
	{
		$material_id = $this->input->post('id');

		echo json_encode($this->M_Material->getDataByID($material_id));
	}

	public function save()
	{
		$material_name = $this->input->post('material_name');
		$id_material = $this->input->post('id_material');
		$mode = $this->input->post('mode');

		echo json_encode($this->M_Material->saveMaterial($material_name, $id_material, $mode));
	}

	public function deleteData()
	{
		$material_id = $this->input->post('material_id');

		echo json_encode($this->M_Material->deleteData($material_id));
	}
}
