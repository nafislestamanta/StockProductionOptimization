<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
		$this->load->model('M_Product');
	}

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/product/index');
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar');
		$this->load->view('master/product/form');
		$this->load->view('partials/footer');
		$this->load->view('master/product/script');
	}

	public function save()
	{
		$product_name = $this->input->post('product_name');
		$production_limit = $this->input->post('production_limit');
		$work_deadline = $this->input->post('work_deadline');
		$labor_limit = $this->input->post('labor_limit');
		$product_profit = $this->input->post('product_profit');

		echo json_encode($this->M_Product->saveProduct($product_name));
	}
}
