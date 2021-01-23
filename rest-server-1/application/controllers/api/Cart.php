<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Cart extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Product_model', 'product');
    }

    public function index_get()
    {
        $cart = $this->cart->getCart();      
        if($cart) {
            $this->response([
                'status' => true,
                'data' => $cart
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Cart not Found'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete(){
        $id_produk = $this->delete('id_produk');

        if($this->cart->deleteProductCart($id_produk)>0){
            $this->response([
                'status' => true,
                'id_produk' => $id_produk,
                'message' => 'Product in Cart Deleted !'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Product id not Found'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function remove_delete(){
        if($this->cart->deleteAllProductCart()>0){
            $this->response([
                'status' => true,
                'message' => 'Cart Deleted!'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_post()
    {
        $data = [
            'id_produk' => $this->post('id_produk'),
            'count' => $this->post('count')
        ];

        $product = $this->cart->checkProductInCart($data['id_produk']);

        $dataUpdate = [
            'count' => ($this->post('count') + $product[0]['count'])
        ];

        if($product) {
            if ($this->cart->updateCountProductCart($dataUpdate, $data['id_produk']) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'Count Product has been Updated in Cart'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Failed to Update Count Product in Cart'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            if ($this->cart->addProductCart($data) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'Product has been Added to Cart'
                ], REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'Failed to Added Product to Cart'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}