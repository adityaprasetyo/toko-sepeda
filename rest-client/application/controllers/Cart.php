<?php

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Transaction_model', 'transaksi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['cart'] = $this->cart->getAllProductCart();
        $data['transaksi'] = $this->transaksi->getAllMethod();

        if (!$data['cart']) {
            $data['cart'] = false;
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required',
            array('required' => 'Cart Tidak Boleh Kosong')
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('cart/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->transaksi->addTransaction();
            $this->cart->removeAllProductInCart();
            $this->session->set_flashdata('flash', 'Data Transaksi Berhasil Ditambahkan');
            redirect('transaction');
        }
    }

    public function tambah($id_product)
    {
        $this->cart->addProductToCart($id_product, 1);
        $this->session->set_flashdata('flash', 'Produk Berhasil Ditambahkan ke Keranjang');
        redirect('cart/index');
    }

    public function hapus($id_product)
    {
        $this->cart->removeProductInCart($id_product);
        $this->session->set_flashdata('flash', 'Produk Berhasil Dihapus dari Keranjang');
        redirect('cart');
    }
}