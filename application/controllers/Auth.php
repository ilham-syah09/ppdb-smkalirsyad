<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('log_admin'))) {
            if ($this->uri->segment(2) != 'logout') {
                $this->session->set_flashdata('notif-error', 'Anda sudah login !');
                redirect('admin');
            }
        } else if (!empty($this->session->userdata('log_user'))) {
            if ($this->uri->segment(2) != 'logout') {
                $this->session->set_flashdata('notif-error', 'Anda sudah login !');
                redirect('user');
            }
        }
        $this->load->model('M_login', 'login');
    }

    public function index()
    {
        $data = [
            'title'     => 'Login',
            'page'     => 'auth/login'
        ];

        $this->load->view('auth/index', $data);
    }


    public function proses()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('toastr-error', validation_errors());
            redirect('auth');
        } else {
            $email   = $this->input->post('email', TRUE);
            $password   = $this->input->post('password');

            $cek = $this->login->cek($email, $password);

            if ($cek == 'admin') {
                $this->session->set_flashdata('swal-success', 'Login berhasil! Selamat datang');
                redirect('admin');
            } else if ($cek == 'user') {
                $this->session->set_flashdata('swal-success', 'Login berhasil! selamat datang');
                redirect('user');
            } else {
                $this->session->set_flashdata('toastr-error', $cek);
                redirect('auth');
            }
        }
    }

    public function registrasi()
    {

        $email = $this->input->post('email', TRUE);
        $nik = $this->input->post('nik', TRUE);
        $user = $this->db->get_where('user', ['email' => $email])->row();
        $biodata = $this->db->get_where('biodata', ['nik' => $nik])->row();

        if ($biodata) {
            $this->session->set_flashdata('swal-error', 'GAGAL, NIK sudah terdaftar!');
            redirect('auth/registrasi', 'refresh');
        } else {
            if ($user) {
                $this->session->set_flashdata('swal-error', 'GAGAL, Email sudah terdaftar!');
                redirect('auth/registrasi', 'refresh');
            } else {
                $this->form_validation->set_rules('name', 'Name', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[retype_password]', [
                    'min_length'    => 'Password terlalu pendek, minimal 6 karakter',
                    'matches'       => 'Password tidak sama!'
                ]);
                $this->form_validation->set_rules('retype_password', 'Konfirmasi Password', 'trim|required|matches[password]');


                if ($this->form_validation->run() == FALSE) {
                    $data = [
                        'title'     => 'Registrasi',
                        'page'      => 'auth/registrasi'
                    ];

                    $this->load->view('auth/index', $data);
                } else {
                    $data = [
                        'name'      => $this->input->post('name', TRUE),
                        'email'     => $this->input->post('email', TRUE),
                        'image'     => 'default.png',
                        'password'  => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'is_active' => 0,
                        'role'      => 2,
                    ];


                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $this->input->post('email', TRUE),
                        'token' => $token,
                        'date_created'  => time()

                    ];

                    $this->db->insert('user', $data);

                    $id = $this->db->insert_id();

                    $data_biodata = [
                        'biodata_id'   => $id,
                        'nik'          => $this->input->post('nik', TRUE),
                        'no_hp'        => $this->input->post('no_hp', TRUE),
                        'progstudi'    => $this->input->post('progstudi', TRUE),
                    ];
                    $this->db->insert('biodata', $data_biodata);

                    $data_wali = [
                        'wali_id'   => $id
                    ];
                    $this->db->insert('wali', $data_wali);

                    $data_berkas = [
                        'berkas_id'   => $id
                    ];
                    $this->db->insert('berkas', $data_berkas);

                    $this->db->insert('user_token', $user_token);

                    $this->_sendEmail($token, 'verify');

                    $this->session->set_flashdata('swal-success', 'Sukses, segera aktivasi akun kamu!');
                    redirect('auth', 'refresh');
                }
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol'] = "smtp";
        $config['mailtype'] = "html";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = "5";
        $config['priority'] = 3;
        $config['smtp_user'] = "smkalirsyadtgal@gmail.com";
        $config['smtp_pass'] = 'nbswrxqyukuxombw';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from($config['smtp_user'], 'SMK AL-IRSYAD TEGAL');
        $this->email->to(
            $this->input->post('email', TRUE)
        );

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Terimakasih sudah registrasi Akun PPDB SMK AL-IRSYAD TEGAL, Klik link berikut untuk aktivasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email', TRUE)
                . '&token=' . urlencode($token) . '">Aktifkan Akun!</a>');
            $this->email->set_mailtype("html");
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link berikut untuk mengatur ulang kata sandi anda : <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email', TRUE)
                . '&token=' . urlencode($token) . '">Reset Password</a>');
            $this->email->set_mailtype("html");
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row();

            if ($user_token) {
                if (time() - $user_token->date_created < (60 * 60 * 24)) {
                    # code...
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('toastr-success', 'Aktivasi berhasil, anda sudah bisa login!');
                    redirect('auth', 'refresh');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('toastr-error', 'GAGAL, Token kadaluarsa');
                    redirect('auth', 'refresh');
                }
            } else {
                $this->session->set_flashdata('toastr-error', 'GAGAL, Token salah!!');
                redirect('auth', 'refresh');
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'GAGAL, user tidak ada!');
            redirect('auth', 'refresh');
        }
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');


        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'     => 'Forgot Password',
                'page'      => 'auth/forgot_password'
            ];

            $this->load->view('auth/index', $data);
        } else {
            $email = $this->input->post('email', TRUE);
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email', TRUE),
                    'token' => $token,
                    'date_created'  => time()

                ];

                $this->db->insert('user_token', $user_token);

                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('toastr-success', 'SUKSES! Cek email anda untuk reset password');
                redirect('auth', 'refresh');
            } else {
                $this->session->set_flashdata('toastr-error', 'Email tidak terdaftar atau email belum aktif');
                redirect('auth/forgotPassword', 'refresh');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row();

            if ($user_token) {
                if (time() - $user_token->date_created < (60 * 60 * 24)) {
                    # code...
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('toastr-error', 'GAGAL, Token kadaluarsa');
                    redirect('auth', 'refresh');
                }
            } else {
                $this->session->set_flashdata('toastr-error', 'GAGAL, Token salah!!');
                redirect('auth', 'refresh');
            }
        } else {
            $this->session->set_flashdata('toastr-error', 'GAGAL, user tidak ada!');
            redirect('auth', 'refresh');
        }
    }

    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {

            redirect('auth', 'refresh');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[retype_password]', [
            'min_length'    => 'Password terlalu pendek, minimal 6 karakter',
            'matches'       => 'Password tidak sama!'
        ]);
        $this->form_validation->set_rules('retype_password', 'Ketik ulang password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            # code...
            $data = [
                'title'     => 'Change Password',
                'page'      => 'auth/change_password'
            ];

            $this->load->view('auth/index', $data);
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('toastr-success', 'Password anda berhasil di reset');
            redirect('auth', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    }
}

/* End of file Auth.php */
