<?php

class Product_model extends CI_Model
{
    public function getProduct($id = null)
    {
        if($id === null)
        {
            $this->db->select('product.id, nama, name, harga, gambar'); 
            $this->db->from('product');
            $this->db->join('kategori', 'product.id_kategori = kategori.id');

            return $this->db->get()->result_array();
        } else {
            $this->db->select('product.id, nama, name, harga, gambar'); 
            $this->db->from('product');
            $this->db->join('kategori', 'product.id_kategori = kategori.id');
            $this->db->where('product.id', $id);

            return $this->db->get()->result_array();
        }
    }
}