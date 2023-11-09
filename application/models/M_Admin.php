<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function countPendaftar()
    {
        $this->db->where('role', 2);
        return $this->db->get('user')->num_rows();
    }

    public function getCalonSiswa()
    {
        $this->db->select('user.*, biodata.*');
        $this->db->from('user');
        $this->db->join('biodata', 'user.id = biodata.biodata_id', 'left');
        $this->db->where('user.role', 2);
        return $this->db->get()->result();
    }

    public function getWaliSiswa()
    {
        $this->db->select('user.*, wali.*');
        $this->db->from('user');
        $this->db->join('wali', 'user.id = wali.wali_id', 'left');
        $this->db->where('user.role', 2);
        return $this->db->get()->result();
    }

    public function getBerkasSiswa()
    {
        $this->db->select('user.*, berkas.*');
        $this->db->from('user');
        $this->db->join('berkas', 'user.id = berkas.berkas_id', 'left');
        $this->db->where('user.role', 2);
        return $this->db->get()->result();
    }

    public function getAdmin()
    {
        $this->db->where('role', 1);
        return $this->db->get('user')->result();
    }

    public function getGelombang()
    {
        return $this->db->get('gelombang')->result();
    }
}

/* End of file M_Admin.php */
