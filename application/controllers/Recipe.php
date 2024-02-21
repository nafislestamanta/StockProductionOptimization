<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recipe extends CI_Controller
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
		$this->load->model('M_Recipe');
	}

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/recipe/index');
		$this->load->view('partials/footer');
		$this->load->view('master/recipe/script');
	}

	public function create()
	{
		$data['product'] = $this->M_Recipe->getDataProduct();
		$data['material'] = $this->M_Recipe->getDataMaterial();

		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/recipe/form', $data);
		$this->load->view('partials/footer');
		$this->load->view('master/recipe/script');
	}

	public function getData()
	{
		echo json_encode($this->M_Recipe->getData());
	}

	public function getDataByID()
	{
		$id_recipe = $this->input->post('id');

		echo json_encode($this->M_Recipe->getDataByID($id_recipe));
	}

	public function edit()
	{
		$data['product'] = $this->M_Recipe->getDataProduct();
		$data['material'] = $this->M_Recipe->getDataMaterial();

		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/recipe/form', $data);
		$this->load->view('partials/footer');
		$this->load->view('master/recipe/script');
	}

	public function save()
	{
		$product = $this->input->post('product');
		$material = $this->input->post('material');
		$limit_material = $this->input->post('limit_material');
		$id_recipe = $this->input->post('id_recipe');
		$mode = $this->input->post('mode');

		echo json_encode($this->M_Recipe->saveRecipe($product, $material, $limit_material, $id_recipe, $mode));
	}

	public function deleteData()
	{
		$id_recipe = $this->input->post('id_recipe');

		echo json_encode($this->M_Recipe->deleteData($id_recipe));
	}
}
