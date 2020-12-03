<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_model extends CI_Model
{
    public function data_tabeltipe() 
    {
        $this->db->select('*');
        $this->db->from('merek');
        $this->db->join('produk','produk.produk_merek = merek.produk_merek');
        $query = $this->db->get();
        return $query;
    }
}