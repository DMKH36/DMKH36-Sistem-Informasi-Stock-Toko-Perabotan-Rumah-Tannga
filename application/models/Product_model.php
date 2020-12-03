<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "produk";

    public $produk_id;
    public $produk_nama;
    public $produk_harga;
    public $produk_gambar = "default.jpg";
    public $produk_kategori;
    public $produk_deskripsi;
    public $produk_warna;
    public $produk_panjang;
    public $produk_tinggi;
    public $produk_berat;
    public $produk_merek;

    public function rules()
    {
        return [
            ['field' => 'produk_nama',
            'label' => 'produk_nama',
            'rules' => 'required'],

            ['field' => 'produk_harga',
            'label' => 'produk_harga',
            'rules' => 'required','numeric'],

            ['field' => 'produk_kategori',
            'label' => 'produk_kategori',
            'rules' => 'required'],

            ['field' => 'produk_deskripsi',
            'label' => 'produk_deskripsi',
            'rules' => 'required'],

            ['field' => 'produk_warna',
            'label' => 'produk_warna',
            'rules' => 'required'],

            ['field' => 'produk_panjang',
            'label' => 'produk_panjang',
            'rules' => 'required','numeric'],

            ['field' => 'produk_tinggi',
            'label' => 'produk_tinggi',
            'rules' => 'required','numeric'],

            ['field' => 'produk_berat',
            'label' => 'produk_berat',
            'rules' => 'required','numeric'],

            ['field' => 'produk_merek',
            'label' => 'produk_merek',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["produk_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->produk_id = uniqid();
        $this->produk_nama = $post["produk_nama"];
        $this->produk_harga = $post["produk_harga"];
        $this->produk_gambar = $this->_uploadImage();
        $this->produk_kategori = $post["produk_kategori"];
        $this->produk_deskripsi = $post["produk_deskripsi"];
        $this->produk_warna = $post["produk_warna"];
        $this->produk_panjang = $post["produk_panjang"];
        $this->produk_tinggi = $post["produk_tinggi"];
        $this->produk_berat = $post["produk_berat"];
        $this->produk_merek = $post["produk_merek"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->produk_id = $post["produk_id"];
        $this->produk_nama = $post["produk_nama"];
        $this->produk_harga = $post["produk_harga"];
        if (!empty($_FILES["produk_gambar"]["produk_nama"])) {
            $this->produk_gambar = $this->_uploadImage();
        } else {
            $this->produk_gambar = $post["foto_bawaan"];
        }
        $this->produk_kategori = $post["produk_kategori"];
        $this->produk_deskripsi = $post["produk_deskripsi"];
        $this->produk_warna = $post["produk_warna"];
        $this->produk_panjang = $post["produk_panjang"];
        $this->produk_tinggi = $post["produk_tinggi"];
        $this->produk_berat = $post["produk_berat"];
        $this->produk_merek = $post["produk_merek"];
        return $this->db->update($this->_table, $this, array('produk_id' => $post['produk_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("produk_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['produk_nama']            = $this->produk_id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1 MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('produk_gambar')) {
            return $this->upload->data("produk_nama");
        }
    
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $produk = $this->getById($id);
        if ($produk->produk_gambar != "default.jpg") {
	        $filename = explode(".", $produk->produk_gambar)[0];
		    return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
        }
    }

}