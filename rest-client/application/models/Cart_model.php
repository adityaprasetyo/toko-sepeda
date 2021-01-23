<?php 

use GuzzleHttp\Client;

class Cart_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/prak-sister/rest-server-1/api/',
            'auth' => ['adit', '4321']
        ]);
    }

    public function getAllProductCart()
    {
        $response = $this->_client->request('GET', 'cart', [
            'query' => [
                'spd-key' => 'spd123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if ($result['status']) {
            return $result['data'];
        } else {
            return false;
        }   
    }

    public function addProductToCart($id_product, $count)
    {
        $response = $this->_client->request('POST', 'cart', [
            'form_params' => [
                'id_produk' => $id_product,
                'count' => $count, 
                'spd-key' => 'spd123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function removeProductInCart($id_product)
    {
        $response = $this->_client->request('DELETE', 'cart', [
            'form_params' => [
                'id_produk' => $id_product, 
                'spd-key' => 'spd123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function removeAllProductInCart()
    {
        $response = $this->_client->request('DELETE', 'cart/remove', [
            'form_params' => [
                'spd-key' => 'spd123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}