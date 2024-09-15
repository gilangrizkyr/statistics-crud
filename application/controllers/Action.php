<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
    }

    public function index()
    {
        $data['karyawan'] = $this->Karyawan_model->get_all_karyawan();
        $data['birthday_today_or_tomorrow'] = $this->Karyawan_model->get_birthday_today_or_tomorrow();
        $this->db->order_by('id', 'DESC',);
        $this->load->view('Manajemen/terbaru', $data);
    }

    public function create()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pendidikan' => $this->input->post('pendidikan'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
        );
        $this->Karyawan_model->insert_karyawan($data);
        $this->Karyawan_model->get_birthday_today_or_tomorrow(); // Update ages after inserting
        $this->session->set_flashdata('sweet_success', 'Data karyawan berhasil ditambahkan');
        redirect('action');
    }

    public function update($id)
    {
        $success = $this->Karyawan_model->update_karyawan($id, [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pendidikan' => $this->input->post('pendidikan'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'umur' => $this->input->post('umur'),
            'golongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
        ]);

        if ($success) {
            $this->Karyawan_model->get_birthday_today_or_tomorrow();
            $this->session->set_flashdata('sweet_success', 'Data berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('sweet_error', 'Gagal memperbarui data. Silakan coba lagi.');
        }

        redirect('action');
    }


    public function edit($id)
    {
        $data['karyawan'] = $this->Karyawan_model->get_karyawan_by_id($id);
        $this->load->view('edit_view', $data);
    }

    public function delete($id)
    {
        $success = $this->Karyawan_model->delete_karyawan($id);

        if ($success) {
            $this->session->set_flashdata('sweet_success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('sweet_error', 'Gagal menghapus data. Silakan coba lagi.');
        }

        redirect('action');
    }
}
