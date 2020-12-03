<?php

class Admin_model extends CI_Model
{
    private $_table = "admin";

    public function doLogin(){
		$post = $this->input->post();

        $this->db->where('admin_email', $post["admin_email"])
                ->or_where('admin_username', $post["admin_email"]);
        $admin = $this->db->get($this->_table)->row();

        if($admin){
            $isPasswordTrue = password_verify($post["admin_password"], $admin->admin_password);

            if($isPasswordTrue){ 
                $this->session->set_userdata(['admin_logged' => $admin]);
                $this->_updateLastLogin($admin->admin_id);
                return true;
            }
        }
        
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('admin_logged') === null;
    }

    private function _updateLastLogin($admin_id){
        $sql = "UPDATE {$this->_table} SET admin_lastlogin=now() WHERE admin_id={$admin_id}";
        $this->db->query($sql);
    }

}