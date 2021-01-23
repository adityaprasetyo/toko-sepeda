<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pembayaran extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id == null) {
            $Pembayaran = $this->pembayaran->getPembayaran();
        } else {
            $Pembayaran = $this->pembayaran->getPembayaran($id);
        }
        
        if($Pembayaran) {
            $this->response([
                'status' => true,
                'data' => $Pembayaran
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Payment not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}