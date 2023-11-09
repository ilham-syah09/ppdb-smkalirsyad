<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wali extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('log_user'))) {
            $this->session->set_flashdata('swal-error', 'Anda Belum Login');
            redirect('auth', 'refresh');
        }

        $this->db->where('id', $this->session->userdata('id'));
        $this->dt_user = $this->db->get('user')->row();

        $this->load->model('M_User', 'user');
    }

    public function index()
    {
        $data = [
            'title'     => 'Wali',
            'navbar'    => 'user/navbar',
            'page'      => 'user/wali',
            'wali'      => $this->user->getOneWali(),
        ];

        $this->load->view('user/index', $data);
    }

    public function updateWali()
    {
        $data = [
            'nama_ayah'         => $this->input->post('nama_ayah'),
            'nama_ibu'          => $this->input->post('nama_ibu'),
            'nama_wali'         => $this->input->post('nama_wali'),
            'nik_ayah'          => $this->input->post('nik_ayah'),
            'nik_ibu'           => $this->input->post('nik_ibu'),
            'nik_wali'          => $this->input->post('nik_wali'),
            'no_handphone'      => $this->input->post('no_handphone'),
            'pendidikan_ayah'   => $this->input->post('pendidikan_ayah'),
            'pendidikan_ibu'    => $this->input->post('pendidikan_ibu'),
            'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah'),
            'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu'),
            'penghasilan_ayah'  => $this->input->post('penghasilan_ayah'),
            'penghasilan_ibu'   => $this->input->post('penghasilan_ibu'),

        ];

        $this->db->where('wali_id', $this->dt_user->id);
        $this->db->update('wali', $data);

        $this->session->set_flashdata('swal-success', 'SUKSES MENGEDIT BIODATA');
        redirect('user/wali', 'refresh');
    }
}
