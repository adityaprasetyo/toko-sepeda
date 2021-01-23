<?php 

use GuzzleHttp\Client;

class Transaction_model extends CI_model {
    
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/prak-sister/rest-server-2/api/',
            'auth' => ['adit', '1234']
        ]);
    }

    public function getAllTransaction()
    {
        $response = $this->_client->request('GET', 'transaksi', [
            'query' => [
                'pay-key' => 'pay123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function addTransaction()
    {
        $data = [
            "id_metode" => $this->input->post('metode', true),
            "kode_pembayaran" => rand(10, 1000),
            "nama" => $this->input->post('nama', true),
            "total" => $this->input->post('total', true),
            "status" => 'SUCCESS',
            'pay-key' => 'pay123'
        ];
        var_dump($data);
        $response = $this->_client->request('POST', 'transaksi', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getAllMethod()
    {
        $response = $this->_client->request('GET', 'pembayaran', [
            'query' => [
                'pay-key' => 'pay123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }
}