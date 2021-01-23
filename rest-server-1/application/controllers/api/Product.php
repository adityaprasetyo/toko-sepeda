<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Product extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Product_model', 'product');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if($id == null) {
            $product = $this->product->getProduct();
        } else {
            $product = $this->product->getProduct($id);
        }
        
        
        if($product) {
            $this->response([
                'status' => true,
                'data' => $product
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Product not Found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}