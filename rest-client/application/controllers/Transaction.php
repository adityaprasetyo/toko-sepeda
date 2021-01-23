<?php 

class Transaction extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaksi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi->getAllTransaction();

        $this->load->view('templates/header');
        $this->load->view('transaction/index', $data);
        $this->load->view('templates/footer');
    }
}