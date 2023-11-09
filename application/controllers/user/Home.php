<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $gelombang = $this->user->getOneRowTable('gelombang');
        $now = date('Y-m-d');

        if ($now >= $gelombang->waktu_mulai && $now <= $gelombang->waktu_akhir) {
            $nama_gelombang = $gelombang->nama;
            $waktu_mulai = tanggal_indonesia($gelombang->waktu_mulai);
            $waktu_akhir = tanggal_indonesia($gelombang->waktu_akhir);
        } else {
            $nama_gelombang = '';
        }

        $data = [
            'title'     => 'Dashboard',
            'navbar'    => 'user/navbar',
            'page'      => 'user/dashboard',
            'user'      => $this->user->getOneBiodata(),
            'wali'      => $this->user->getOneWali(),
            'berkas'    => $this->user->getOneBerkas(),
            'gelombang' => $nama_gelombang,
            'waktu_mulai' => $waktu_mulai,
            'waktu_akhir' => $waktu_akhir
        ];

        $this->load->view('user/index', $data);
    }
}
