<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
            'title'     => 'Setting',
            'navbar'    => 'user/navbar',
            'page'      => 'user/setting',
        ];

        $this->load->view('user/index', $data);
    }

    public function changePassword()
    {
        $currentPwd = $this->input->post('current_password');

        if (password_verify($currentPwd, $this->dt_user->password)) {

            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[retype_password]', [
                'min_length'    => 'Password terlalu pendek, minimal 6 karakter',
                'matches'       => 'Password tidak sama!'
            ]);
            $this->form_validation->set_rules('retype_password', 'Ketik ulang password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == FALSE) {
                # code...
                $data = [
                    'title'     => 'Setting',
                    'navbar'    => 'user/navbar',
                    'page'      => 'user/setting',
                ];

                $this->load->view('user/index', $data);
            } else {

                $data = [
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                ];

                $this->db->where('id', $this->dt_user->id);
                $this->db->update('user', $data);
                $this->session->set_flashdata('swal-success', 'Kata sandi berhasil di perbaharui');
                redirect('user/setting', 'refresh');
            }
        } else {
            $this->session->set_flashdata('swal-error', 'Password sekarang salah!');
            redirect('user/setting');
        }
    }
}
