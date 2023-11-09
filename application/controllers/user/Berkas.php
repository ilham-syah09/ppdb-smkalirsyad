<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
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
            'title'     => 'Berkas',
            'navbar'    => 'user/navbar',
            'page'      => 'user/berkas',
            'berkas'    => $this->user->getOneBerkas(),
        ];

        $this->load->view('user/index', $data);
    }

    public function uploadBerkas()
    {
        if (!$this->session->userdata('log_user')) {
            $this->session->set_flashdata('swal-eror', 'Silahkan login terlebih dahulu !');

            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }

        $cek = $this->user->getOneBerkas();

        if (!$cek) {
            $this->db->insert('berkas', [
                'berkas_id' => $this->dt_user->id
            ]);
        }

        $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
        $akte           = $_FILES['akte']['name'];
        $ijazah         = $_FILES['ijazah']['name'];
        $sertifikat     = $_FILES['sertifikat']['name'];

        if ($kartu_keluarga) {

            $config['upload_path'] = 'uploads/berkas/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['max_size']  = 2048;
            $config['remove_spaces']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('kartu_keluarga')) {
                $this->session->set_flashdata('kartu_keluarga', $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();

                $data = [
                    'kartu_keluarga'    => $upload_data['file_name']
                ];

                $this->db->where('berkas_id', $this->dt_user->id);
                $update = $this->db->update('berkas', $data);

                if ($update) {
                    if ($cek->kartu_keluarga != null) {
                        unlink(FCPATH . 'uploads/berkas/' . $cek->kartu_keluarga);
                    }

                    $this->session->set_flashdata('kartu_keluarga', 'Kartu Keluarga berhasil diupload');
                } else {
                    $this->session->set_flashdata('kartu_keluarga', 'Kartu Keluarga gagal diupload');
                }
            }
        }

        if ($akte) {

            $config['upload_path'] = 'uploads/berkas/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['max_size']  = 2048;
            $config['remove_spaces']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('akte')) {
                $this->session->set_flashdata('akte', $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();

                $data = [
                    'akte'    => $upload_data['file_name']
                ];

                $this->db->where('berkas_id', $this->dt_user->id);
                $update = $this->db->update('berkas', $data);

                if ($update) {
                    if ($cek->akte != null) {
                        unlink(FCPATH . 'uploads/berkas/' . $cek->akte);
                    }

                    $this->session->set_flashdata('akte', 'Akte berhasil diupload');
                } else {
                    $this->session->set_flashdata('akte', 'Akte gagal diupload');
                }
            }
        }

        if ($ijazah) {

            $config['upload_path'] = 'uploads/berkas/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['max_size']  = 2048;
            $config['remove_spaces']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('ijazah')) {
                $this->session->set_flashdata('ijazah', $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();

                $data = [
                    'ijazah'    => $upload_data['file_name']
                ];

                $this->db->where('berkas_id', $this->dt_user->id);
                $update = $this->db->update('berkas', $data);

                if ($update) {
                    if ($cek->ijazah != null) {
                        unlink(FCPATH . 'uploads/berkas/' . $cek->ijazah);
                    }

                    $this->session->set_flashdata('ijazah', 'Ijazah berhasil diupload');
                } else {
                    $this->session->set_flashdata('ijazah', 'Ijazah gagal diupload');
                }
            }
        }

        if ($sertifikat) {

            $config['upload_path'] = 'uploads/berkas/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['max_size']  = 2048;
            $config['remove_spaces']  = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('sertifikat')) {
                $this->session->set_flashdata('sertifikat', $this->upload->display_errors());
            } else {
                $upload_data = $this->upload->data();

                $data = [
                    'sertifikat'    => $upload_data['file_name']
                ];

                $this->db->where('berkas_id', $this->dt_user->id);
                $update = $this->db->update('berkas', $data);

                if ($update) {
                    if ($cek->sertifikat != null) {
                        unlink(FCPATH . 'uploads/berkas/' . $cek->sertifikat);
                    }

                    $this->session->set_flashdata('sertifikat', 'Sertifikat berhasil diupload');
                } else {
                    $this->session->set_flashdata('sertifikat', 'Sertifikat gagal diupload');
                }
            }
        }

        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }
}
