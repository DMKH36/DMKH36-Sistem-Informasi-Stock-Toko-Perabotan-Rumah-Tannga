<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    private $_table = "pengguna";

    public $pengguna_id;
    public $pengguna_nama;
    public $pengguna_username;
    public $pengguna_email;
    public $pengguna_password;
    public $pengguna_hp;
    public $pengguna_alamat;
    public $pengguna_lastlogin;

    public function rules()
    {
        return [
            ['field' => 'pengguna_nama',
            'label' => 'pengguna_nama',
            'rules' => 'required'],

            ['field' => 'pengguna_username',
            'label' => 'pengguna_username',
            'rules' => 'required'],

            ['field' => 'pengguna_email',
            'label' => 'pengguna_email',
            'rules' => 'required'],

            ['field' => 'pengguna_password',
            'label' => 'pengguna_password',
            'rules' => 'required'],

            ['field' => 'pengguna_hp',
            'label' => 'pengguna_hp',
            'rules' => 'required', 'numeric'],

            ['field' => 'pengguna_alamat',
            'label' => 'pengguna_alamat',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pengguna_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->pengguna_id = uniqid();
        $this->pengguna_nama = $post["pengguna_nama"];
        $this->pengguna_username = $post["pengguna_username"];
        $this->pengguna_email = $post["pengguna_email"];
        $this->pengguna_password = $post["pengguna_password"];
        $this->pengguna_hp = $post["pengguna_hp"];
        $this->pengguna_alamat = $post["pengguna_alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->pengguna_nama = $post["pengguna_nama"];
        $this->pengguna_username = $post["pengguna_username"];
        $this->pengguna_email = $post["pengguna_email"];
        $this->pengguna_password = $post["pengguna_password"];
        $this->pengguna_hp = $post["pengguna_hp"];
        $this->pengguna_alamat = $post["pengguna_alamat"];
        return $this->db->update($this->_table, $this, array('pengguna_id' => $post['pengguna_id']));
    }

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('pengguna_email', $post["pengguna_email"])
                ->or_where('pengguna_username', $post["pengguna_email"]);
        $pengguna = $this->db->get($this->_table)->row();

        if($pengguna){
            $isPasswordTrue = password_verify($post["pengguna_password"], $pengguna->pengguna_password);

            if($isPasswordTrue){ 
                $this->session->set_userdata(['pengguna_logged' => $pengguna]);
                $this->_updateLastLogin($pengguna->pengguna_id);
                return true;
            }
        }
        
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('pengguna_logged') === null;
    }

    private function _updateLastLogin($pengguna_id){
        $sql = "UPDATE {$this->_table} SET pengguna_lastlogin=now() WHERE pengguna_id={$pengguna_id}";
        $this->db->query($sql);
    }

}