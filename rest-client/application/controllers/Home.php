<?php 

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'product');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['product'] = $this->product->getAllProduct();

        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['product'] = $this->product->getProductById($id);

        $this->load->view('templates/header');
        $this->load->view('home/detail', $data);
        $this->load->view('templates/footer');
    }
}