<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calon_siswa extends CI_Controller
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
            'title'     => 'Calon Siswa | PPDB ALIR',
            'sidebar'   => 'admin/sidebar',
            'page'      => 'admin/calon_siswa.php',
            'siswa'     => $this->admin->getCalonSiswa()
        ];

        $this->load->view('admin/index', $data);
    }

    public function deleteCalonSiswa($id)
    {
        $this->db->where('id', $id);
        $user = $this->db->get('user')->row();

        if ($user) {
            $this->db->delete('user', ['id'  => $id]);
            $this->db->delete('biodata', ['biodata_id'  => $id]);
            $this->db->delete('wali', ['wali_id'  => $id]);

            $this->db->where('berkas_id', $id);
            $berkas = $this->db->get('berkas')->row();
            $this->db->delete('berkas', ['berkas_id'  => $id]);
            if ($berkas) {
                unlink(FCPATH . 'uploads/berkas/' . $berkas->kartu_keluarga);
                unlink(FCPATH . 'uploads/berkas/' . $berkas->ijazah);
                unlink(FCPATH . 'uploads/berkas/' . $berkas->akte);
                unlink(FCPATH . 'uploads/berkas/' . $berkas->sertifikat);
                $this->session->set_flashdata('toastr-success', 'Berhasil hapus data!');
                redirect('admin/calon_siswa', 'refresh');
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'Gagal data tidak ditemukan!');
            redirect('admin/calon_siswa', 'refresh');
        }
    }
}
