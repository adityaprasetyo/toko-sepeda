<?php

class Pembayaran_model extends CI_Model
{
    public function getPembayaran($id = null)
    {
        if($id === null)
        {
            return $this->db->get('metode_pembayaran')->result_array();
        } else {
            return $this->db->get_where('metode_pembayaran', ['id' => $id])->result_array();
        }
    }
}