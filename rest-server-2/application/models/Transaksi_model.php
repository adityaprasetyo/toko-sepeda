<?php

class Transaksi_model extends CI_Model
{
    public function getTransaction($id = null)
    {
        if($id === null)
        {
            $this->db->select('nama, nama_metode, total'); 
            $this->db->from('transaksi');
            $this->db->join('metode_pembayaran', 'transaksi.id_metode = metode_pembayaran.id');
            $this->db->order_by('transaksi.id', 'asc');

            return $this->db->get()->result_array();
        } else {
            return $this->db->get_where('transaksi', ['id' => $id])->result_array();
        }
    }

    public function addTransaction($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->affected_rows();
    } 
}