<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
            'title'     => 'Profile | PPDB ALIR',
            'sidebar'   => 'admin/sidebar',
            'page'      => 'admin/profile',
        ];

        $this->load->view('admin/index', $data);
    }

    public function edit()
    {
        if ($this->input->post('password')) {

            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[retypepwd]');
            $this->form_validation->set_rules('retypepwd', 'Retype Password', 'trim|required|matches[password]');


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('toastr-error', 'failed!');
                redirect('admin/profile', 'refresh');
            } else {
                $img = $_FILES['image']['name'];

                if ($img) {
                    $config['upload_path']      = 'uploads/profile';
                    $config['allowed_types']    = 'jpg|jpeg|png';
                    $config['max_size']         = 2000;
                    $config['remove_spaces']    = TRUE;
                    $config['encrypt_name']     = TRUE;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('image')) {
                        $this->session->set_flashdata('toastr-error', $this->upload->display_errors());
                        redirect('admin/profile');
                    } else {
                        $upload_data = $this->upload->data();

                        $data = [
                            'name'  => $this->input->post('name'),
                            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                            'image'     => $upload_data['file_name']
                        ];

                        $this->db->where('id', $this->dt_user->id);
                        $update = $this->db->update('user', $data);

                        if ($update) {
                            if ($this->dt_user->image != 'default.png') {
                                unlink(FCPATH . 'uploads/profile/' . $this->dt_user->image);
                            }
                            $this->session->set_flashdata('toastr-success', 'success !');
                            redirect('admin/profile');
                        } else {
                            $this->session->set_flashdata('toastr-error', 'failed!');
                            redirect('admin/profile');
                        }
                    }
                } else {
                    $data = [
                        'name'  => $this->input->post('name'),
                        'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    ];

                    $this->db->where('id', $this->dt_user->id);
                    $update = $this->db->update('user', $data);

                    if ($update) {
                        $this->session->set_flashdata('toastr-success', 'success !');
                        redirect('admin/profile');
                    } else {
                        $this->session->set_flashdata('toastr-error', 'failed!');
                        redirect('admin/profile');
                    }
                }
            }
        } else {
            $img = $_FILES['image']['name'];

            if ($img) {
                $config['upload_path']      = 'uploads/profile';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']         = 2000;
                $config['remove_spaces']    = TRUE;
                $config['encrypt_name']     = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('toastr-eror', $this->upload->display_errors());
                    redirect('admin/profile');
                } else {
                    $upload_data = $this->upload->data();

                    $data = [
                        'name'  => $this->input->post('name'),
                        'image'     => $upload_data['file_name']
                    ];

                    $this->db->where('id', $this->dt_user->id);
                    $update = $this->db->update('user', $data);

                    if ($update) {
                        if ($this->dt_user->image != 'default.png') {
                            unlink(FCPATH . 'uploads/profile/' . $this->dt_user->image);
                        }
                        $this->session->set_flashdata('toastr-success', 'success !');
                        redirect('admin/profile');
                    } else {
                        $this->session->set_flashdata('toastr-error', 'failed!');
                        redirect('admin/profile');
                    }
                }
            } else {
                $data = [
                    'name'  => $this->input->post('name'),
                ];

                $this->db->where('id', $this->dt_user->id);
                $update = $this->db->update('user', $data);

                if ($update) {
                    $this->session->set_flashdata('toastr-success', 'success !');
                    redirect('admin/profile');
                } else {
                    $this->session->set_flashdata('toastr-error', 'failed!');
                    redirect('admin/profile');
                }
            }
        }
    }
}
