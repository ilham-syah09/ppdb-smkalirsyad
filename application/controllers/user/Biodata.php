<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
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
            'title'     => 'Biodata',
            'navbar'    => 'user/navbar',
            'page'      => 'user/biodata',
            'user'      => $this->user->getOneBiodata(),
        ];

        $this->load->view('user/index', $data);
    }

    public function updateBiodata()
    {
        $data = [
            'name'      => $this->input->post('name'),
        ];

        $biodata = [
            'nik'               => $this->input->post('nik'),
            'jk'                => $this->input->post('jk'),
            'tempat_lahir'      => $this->input->post('tempat_lahir'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'alamat'            => $this->input->post('alamat'),
            'penerima_bantuan'  => $this->input->post('penerima_bantuan'),
            'no_bantuan'        => $this->input->post('no_bantuan'),
            'tempat_tinggal'    => $this->input->post('tempat_tinggal'),
            'jenis_pendaftaran' => $this->input->post('jenis_pendaftaran'),
            'no_hp'             => $this->input->post('no_hp'),
            'sekolah_asal'      => $this->input->post('sekolah_asal'),
            'alamat_sekolah'    => $this->input->post('alamat_sekolah'),
            'progstudi'         => $this->input->post('progstudi'),

        ];

        $this->db->where('id', $this->dt_user->id);
        $this->db->update('user', $data);

        $this->db->where('biodata_id', $this->dt_user->id);
        $this->db->update('biodata', $biodata);


        $this->session->set_flashdata('swal-success', 'SUKSES MENGEDIT BIODATA');
        redirect('user/biodata', 'refresh');
    }

    public function uploadFoto()
    {
        $upload_foto = $_FILES['image']['name'];

        if ($upload_foto) {

            $config['upload_path']      = 'uploads/profile';
            $config['allowed_types']    = 'png|jpg|jpeg';
            $config['max_size']         = 2048;
            $config['remove_spaces']    = TRUE;
            $config['encrypt_name']      = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('swal-error', $this->upload->display_errors());
                redirect($_SERVER['HTTP_REFERER'], 'refresh');
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'image'         => $upload_data['file_name'],
                ];

                $this->db->where('id', $this->dt_user->id);
                $update = $this->db->update('user', $data);

                if ($update) {
                    if ($this->dt_user->image != 'default.png') {
                        unlink(FCPATH . 'uploads/profile/' . $this->dt_user->image);
                    }
                    $this->session->set_flashdata('swal-success', 'Berhasil perbarui foto');
                } else {
                    $this->session->set_flashdata('swal-success', 'Gagal perbarui foto');
                }
            }
        } else {
            $this->session->set_flashdata('swal-error', 'Harap pilih foto!');
        }
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

    public function printBiodata()
    {

        $siswa = $this->user->getOneBiodata();
        $wali = $this->user->getOneWali();

        // error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('p', 'mm', array(215, 330));
        $pdf->AddPage();
        $pdf->SetMargins(20, 10, 20);

        // Insert a logo in the top-left corner at 300 dpi
        $pdf->Image('assets/img/kop_surat.png', 20, 10, -270);

        $pdf->Ln(35);



        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(30, 8, '', 0, 0);
        $pdf->Cell(120, 8, 'FORMULIR PENDAFTARAN PESERTA DIDIK BARU', 0, 0, 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(30, 8, '', 0, 0);
        $pdf->Cell(120, 8, 'TAHUN PELAJARAN 2023/2024', 0, 0, 'C');
        $pdf->Ln(10);


        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(30, 10, 'A. BIODATA PESERTA DIDIK', 0, 0);

        $pdf->Ln(6);

        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(70, 10, 'Nama', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $this->dt_user->name, 0);

        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'NIK', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->nik, 0);

        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Jenis Kelamin', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->jk, 0);

        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Tempat Lahir', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->tempat_lahir, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Tanggal Lahir', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, date('d-m-Y', strtotime($siswa->tanggal_lahir)), 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Alamat', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->alamat, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Email', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $this->dt_user->email, 0);
        $pdf->Ln(6);
        $pdf->Cell(70, 10, 'No Handphone/Whatsapp', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->no_hp, 0);
        $pdf->Ln(6);
        $pdf->Cell(70, 10, 'Tempat Tinggal', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->tempat_tinggal, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Penerima Bantuan', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, ($siswa->penerima_bantuan == NULL) ? '-' : $siswa->penerima_bantuan, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Nomor Bantuan', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, ($siswa->no_bantuan == NULL) ? '-' : $siswa->no_bantuan, 0);

        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(30, 10, 'B. DATA ORANG TUA/WALI', 0, 0);

        $pdf->Ln(6);

        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(70, 10, 'Nama Ayah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->nama_ayah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'NIK Ayah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->nik_ayah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Nama Ibu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->nama_ibu, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'NIK Ibu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->nik_ibu, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Nama Wali', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, ($wali->nama_wali == NULL) ? '-' : $wali->nama_wali, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'NIK Wali', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, ($wali->nik_wali == NULL) ? '-' : $wali->nik_wali, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'No Handphone/Whatsapp', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->no_handphone, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Pendidikan Ayah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->pendidikan_ayah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Pendidikan Ibu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->pendidikan_ibu, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Pekerjaan Ayah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->pekerjaan_ayah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Pekerjaan Ibu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->pekerjaan_ibu, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Penghasilan Ayah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->penghasilan_ayah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Penghasilan Ibu', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $wali->penghasilan_ibu, 0);

        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(30, 10, 'C. REGISTRASI PESERTA DIDIK', 0, 0);
        $pdf->Ln(6);

        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(70, 10, 'Jenis Pendaftaran', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->jenis_pendaftaran, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Sekolah Asal', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->sekolah_asal, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Alamat Sekolah', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->alamat_sekolah, 0);
        $pdf->Ln(6);

        $pdf->Cell(70, 10, 'Program Studi', 0, 0);
        $pdf->Cell(5, 10, ':', 0, 0, 'C');
        $pdf->Cell(50, 10, $siswa->progstudi, 0);

        $pdf->Ln(12);

        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(150);
        $pdf->Cell(5, 10, 'Tegal, ' . date('d F Y'), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(70, 10, 'Orang Tua/Wali', 0, 0);
        $pdf->Cell(50);
        $pdf->Cell(70, 10, 'Peserta Didik', 0, 0);
        $pdf->Ln(25);
        $pdf->Cell(70, 10, ($wali->nama_ayah != NULL) ? $wali->nama_ayah : $wali->nama_ibu, 0, 0);
        $pdf->Cell(60);
        $pdf->Cell(15, 10, $this->dt_user->name, 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetAutoPageBreak(false);
        $pdf->SetFont('Times', 'I', 10);
        $pdf->Cell(70, 10, 'Catatan: Yang bertanda tangan Orang Tua/Wali atau Peserta Didik, Bertanggung jawab secara hukum terhadap kebenaran', 0, 0);
        $pdf->Ln(6);
        $pdf->Cell(70, 10, 'data yang tercantum', 0, 0);


        $pdf->Output($siswa->nik . '_' . $this->dt_user->name . ' .pdf', 'I');
    }
}
