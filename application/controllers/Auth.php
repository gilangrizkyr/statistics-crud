<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        //load models
        parent::__construct();
        $this->load->model('Karyawan_model');
    }

    public function index()
    {
        $data['jenis_kelamin_data'] = $this->Karyawan_model->get_jenis_kelamin_data();
        $this->load->view('Karyawan/index', $data);
        $this->load->view('Karyawan/Template/footer', $data);
    }

    public function pendidikan()
    {
        $data['data_pendidikan'] = $this->Karyawan_model->get_pendidikan_data();
        $this->load->view('Karyawan/pendidikan', $data);
        $this->load->view('Karyawan/Template/footer', $data);
    }

    public function jabatan()
    {
        $data['data_jabatan'] = $this->Karyawan_model->get_jabatan_data();
        $this->load->view('Karyawan/jabatan', $data);
        $this->load->view('Karyawan/Template/footer', $data);
    }

    public function golongan()
    {
        $data['data_golongan'] = $this->Karyawan_model->get_golongan_data();
        $this->load->view('Karyawan/golongan', $data);
        $this->load->view('Karyawan/Template/footer', $data);
    }

    public function umur()
    {
        $data['umur_ranges'] = $this->Karyawan_model->get_umur_ranges();
        $this->load->view('Karyawan/umur', $data);
        $this->load->view('Karyawan/Template/footer', $data);
    }
}
