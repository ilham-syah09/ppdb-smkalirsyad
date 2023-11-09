<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_admin extends CI_Controller
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
            'title'     => 'List Administrator | PPDB ALIR',
            'sidebar'   => 'admin/sidebar',
            'page'      => 'admin/list_admin',
            'admin'     => $this->admin->getAdmin()
        ];

        $this->load->view('admin/index', $data);
    }

    public function add()
    {
        $email = $this->input->post('email');

        $cek = $this->db->get_where('user', ['email' => $email])->row();

        if ($cek) {
            $this->session->set_flashdata('toastr-error', 'Email sudah terdaftar!');
            redirect('admin/list_admin', 'refresh');
        } else {
            $data = [
                'name'  => $this->input->post('name', TRUE),
                'email'  => $this->input->post('email', TRUE),
                'role'  => 1,
                'is_active' => 1,
                'image' => 'default.png',
                'password'  => password_hash('adminalir03', PASSWORD_BCRYPT)
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('toastr-success', 'Sukses tambah administrator!');
            redirect('admin/list_admin', 'refresh');
        }
    }

    public function resetPwd($id)
    {
        $data = [
            'password'  => password_hash('adminalir03', PASSWORD_BCRYPT),
        ];

        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->session->set_flashdata('toastr-success', 'Sukses reset password!');
            redirect('admin/list_admin', 'refresh');
        } else {
            $this->session->set_flashdata('toastr-error', 'Gagal reset password!');
            redirect('admin/list_admin', 'refresh');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('user')->row();

        $this->db->where('id', $id);
        $delete = $this->db->delete('user');

        if ($delete) {
            if ($data->image != 'default.png') {
                unlink(FCPATH . 'uploads/profile/' . $data->image);
            }

            $this->session->set_flashdata('toastr-success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('toastr-error', 'Data gagal dihapus!!');
        }

        redirect('admin/list_admin', 'refresh');
    }
}
