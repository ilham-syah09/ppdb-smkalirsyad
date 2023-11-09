<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resume extends CI_Controller
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

        $this->load->library('Pdf');
    }

    public function index()
    {
        $data = [
            'title'     => 'Resume',
            'navbar'    => 'user/navbar',
            'page'      => 'user/resume',
            'user'      => $this->user->getOneBiodata(),
            'wali'      => $this->user->getOneWali(),
            'berkas'    => $this->user->getOneBerkas(),
        ];

        $this->load->view('user/index', $data);
    }
}
