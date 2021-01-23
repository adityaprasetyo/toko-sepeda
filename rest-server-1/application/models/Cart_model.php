<?php

class Cart_model extends CI_Model
{
    public function getCart(){
        $this->db->select('id_produk, nama, gambar, count, harga');
        $this->db->from('cart');
        $this->db->join('product', 'cart.id_produk = product.id');
        
        return $this->db->get()->result_array();
    }

    public function deleteProductCart($id_produk)
    {
        $this->db->delete('cart', ['id_produk' => $id_produk]);
        return $this->db->affected_rows();
    }

    public function deleteAllProductCart()
    {
        $this->db->empty_table('cart');
        return $this->db->affected_rows();
    }

    public function addProductCart($data)
    {
        $this->db->insert('cart', $data);
        return $this->db->affected_rows();
    }

    public function checkProductInCart($id_produk)
    {
        $this->db->select('count');
        $this->db->from('cart');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result_array();
    }

    public function updateCountProductCart($data, $id_produk)
    {
        $this->db->update('cart', $data, ['id_produk' => $id_produk]);
        return $this->db->affected_rows();
    }
}