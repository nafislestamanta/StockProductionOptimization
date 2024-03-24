<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockOptimization extends CI_Controller
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
        $this->load->model('M_StockOptimization');
    }

    public function index()
    {
        $data['title'] = 'Optimasi Stok';
        $data['product'] = $this->M_StockOptimization->getDataProduct();
        $data['material'] = $this->M_StockOptimization->getDataMaterial();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('stock_optimization/form', $data);
        $this->load->view('partials/footer');
        $this->load->view('stock_optimization/script', $data);
    }

    public function edit()
    {
        $data['title'] = 'Optimasi Stok';
        $data['product'] = $this->M_StockOptimization->getDataProduct();
        $data['material'] = $this->M_StockOptimization->getDataMaterial();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('stock_optimization/form', $data);
        $this->load->view('partials/footer');
        $this->load->view('stock_optimization/script');
    }

    public function getCBData()
    {
        $data['product'] = $this->M_StockOptimization->getDataProduct();
        $data['material'] = $this->M_StockOptimization->getDataMaterial();

        echo json_encode($data);
    }

    public function deleteData()
    {
        $id_recipe = $this->input->post('id_recipe');

        echo json_encode($this->M_StockOptimization->deleteData($id_recipe));
    }
}
