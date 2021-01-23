<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Transaksi extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id == null) {
            $Transaksi = $this->transaksi->getTransaction();
        } else {
            $Transaksi = $this->transaksi->getTransaction($id);
        }
        
        if($Transaksi) {
            $this->response([
                'status' => true,
                'data' => $Transaksi
            ], REST_Controller::HTTP_OK);
        } else {    
            $this->response([
                'status' => false,
                'message' => 'Payment not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_post()
    {
        $data = [
            'id_metode' => $this->post('id_metode'),
            'kode_pembayaran' => $this->post('kode_pembayaran'),
            'nama' => $this->post('nama'),
            'total' => $this->post('total'),
            'status' => $this->post('status')
        ];

        if ($this->transaksi->addTransaction($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Payment Successfully !'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to Pay Your Transaction'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}   