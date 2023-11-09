<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('log_admin'))) {
            $this->session->set_flashdata('swal-error', 'Anda Belum Login');
            redirect('auth', 'refresh');
        }

        $this->db->where('id', $this->session->userdata('id'));
        $this->dt_user = $this->db->get('user')->row();

        $this->load->model('M_Admin', 'admin');
    }

    public function index()
    {
        $data = [
            'title'     => 'Berkas Calon Siswa | PPDB ALIR',
            'sidebar'   => 'admin/sidebar',
            'page'      => 'admin/berkas_siswa.php',
            'berkas'    => $this->admin->getBerkasSiswa()
        ];

        $this->load->view('admin/index', $data);
    }
}
