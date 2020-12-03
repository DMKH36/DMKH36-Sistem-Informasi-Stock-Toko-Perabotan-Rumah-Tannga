<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{
    private $_table = "merek";

    public $merek_id;
    public $produk_merek;
    public $merek_logo = "default.jpg";
    public $merek_lokasi;
    public $merek_deskripsi;

    public function rules()
    {
        return [
            ['field' => 'produk_merek',
            'label' => 'produk_merek',
            'rules' => 'required'],

            ['field' => 'merek_lokasi',
            'label' => 'merek_lokasi',
            'rules' => 'required'],

            ['field' => 'merek_deskripsi',
            'label' => 'merek_deskripsi',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["merek_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->merek_id = uniqid();
        $this->produk_merek = $post["produk_merek"];
        $this->merek_logo = $this->_uploadImage();
        $this->merek_lokasi = $post["merek_lokasi"];
        $this->merek_deskripsi = $post["merek_deskripsi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->merek_id = $post["merek_id"];
        $this->produk_merek = $post["produk_merek"];
        if (!empty($_FILES["merek_logo"]["produk_merek"])) {
            $this->merek_logo = $this->_uploadImage();
        } else {
            $this->merek_logo = $post["foto_bawaan"];
        }
        $this->merek_lokasi = $post["merek_lokasi"];
        $this->merek_deskripsi = $post["merek_deskripsi"];
        return $this->db->update($this->_table, $this, array('merek_id' => $post['merek_id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("merek_id" => $id));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/perusahaan/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['produk_merek']            = $this->merek_id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1 MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('merek_logo')) {
            return $this->upload->data("produk_merek");
        }
    
        return "default.jpg";
    }

    private function _deleteImage($id)
    {
        $merek = $this->getById($id);
        if ($merek->merek_logo != "default.jpg") {
	        $filename = explode(".", $merek->merek_logo)[0];
		    return array_map('unlink', glob(FCPATH."upload/perusahaan/$filename.*"));
        }
    }

}