<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Intro extends CI_Controller
{

    public function index()
    {
        $this->load->view('intro/index');
        // echo "masuk";
    }
}
