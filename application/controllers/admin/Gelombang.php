<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gelombang extends CI_Controller
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
            'title'     => 'Gelombang | PPDB ALIR',
            'sidebar'   => 'admin/sidebar',
            'page'      => 'admin/gelombang',
            'gelombang' => $this->admin->getGelombang()
        ];

        $this->load->view('admin/index', $data);
    }

    public function add()
    {
        $data = [
            'nama'          => $this->input->post('nama', TRUE),
            'waktu_mulai'  => $this->input->post('waktu_mulai', TRUE),
            'waktu_akhir'  => $this->input->post('waktu_akhir', TRUE),
        ];

        $this->db->insert('gelombang', $data);
        $this->session->set_flashdata('toastr-success', 'Berhasil tambah gelombang');
        redirect('admin/gelombang', 'refresh');
    }

    public function edit()
    {
        $data = [
            'nama'          => $this->input->post('nama', TRUE),
            'waktu_mulai'  => $this->input->post('waktu_mulai', TRUE),
            'waktu_akhir'  => $this->input->post('waktu_akhir', TRUE),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('gelombang', $data);
        $this->session->set_flashdata('toastr-success', 'Berhasil tambah gelombang');
        redirect('admin/gelombang', 'refresh');
    }

    public function delete($id)
    {
        $this->db->delete('gelombang', ['id' => $id]);
        $this->session->set_flashdata('toastr-success', 'Berhasil tambah gelombang');
        redirect('admin/gelombang', 'refresh');
    }
}
