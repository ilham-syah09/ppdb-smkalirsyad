<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    public function getOneBiodata()
    {
        $this->db->where('biodata_id', $this->dt_user->id);
        return $this->db->get('biodata')->row();
    }

    public function getOneWali()
    {
        $this->db->where('wali_id', $this->dt_user->id);
        return $this->db->get('wali')->row();
    }

    public function getOneBerkas()
    {
        $this->db->where('berkas_id', $this->dt_user->id);
        return $this->db->get('berkas')->row();
    }

    public function getOneRowTable($table)
    {
        return $this->db->get($table)->row();
    }
}

/* End of file M_User.php */
