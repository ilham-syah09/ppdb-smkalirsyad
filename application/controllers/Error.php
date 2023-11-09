<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error extends CI_Controller
{
    public function error404()
    {
        $this->load->view('error404');
    }
}

/* End of file Controllername.php */
