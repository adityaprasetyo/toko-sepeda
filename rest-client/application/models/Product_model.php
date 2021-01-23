<?php 

use GuzzleHttp\Client;

class Product_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/prak-sister/rest-server-1/api/',
            'auth' => ['adit', '4321']
        ]);
    }

    public function getAllProduct()
    {
        $response = $this->_client->request('GET', 'Product', [
            'query' => [
                'spd-key' => 'spd123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getProductById($id)
    {
        $response = $this->_client->request('GET', 'Product'
        , [
            'query' => [
                'spd-key' => 'spd123',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'][0];
    }
}