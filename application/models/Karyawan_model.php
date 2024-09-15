<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    // public function get_all_karyawan()
    // {
    //     $this->db->select('id, nama, jenis_kelamin, pendidikan, tanggal_lahir, golongan, jabatan, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur');
    //     $this->db->from('data_karyawan');
    //     $this->db->order_by('id', 'DESC');
    //     return $this->db->get()->result_array();
    //     echo $this->db->last_query();
    //     return $query->result_array();
    // }
    public function get_all_karyawan()
    {
        $this->db->select('id, nama, jenis_kelamin, pendidikan, tanggal_lahir, golongan, jabatan, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur');
        $this->db->from('data_karyawan');
        $this->db->order_by('id', 'DESC'); // Mengurutkan berdasarkan id terbaru di atas
        return $this->db->get()->result_array();
    }


    public function get_tanggal_lahir()
    {
        $query = $this->db->select('tanggal_lahir, COUNT(*) as jumlah')
            ->from('data_karyawan')
            ->group_by('tanggal_lahir')
            ->get();
        return $query->result_array();
    }

    // public function umur()
    // {
    //     $query = $this->db->select('umur, COUNT (*) as jumlah')
    //         ->from('data_karyawan')
    //         ->group_by('umur')
    //         ->get();
    // }

    public function get_jenis_kelamin_data()
    {
        $query = $this->db->select('jenis_kelamin, COUNT(*) as jumlah')
            ->from('data_karyawan')
            ->group_by('jenis_kelamin')
            ->get();
        return $query->result_array();
    }

    public function get_pendidikan_data()
    {
        $query = $this->db->select('pendidikan, COUNT(*) as jumlah')
            ->from('data_karyawan')
            ->group_by('pendidikan')
            ->get();
        return $query->result_array();
    }

    public function get_jabatan_data()
    {
        $query = $this->db->select('jabatan, COUNT(*) as jumlah')
            ->from('data_karyawan')
            ->group_by('jabatan')
            ->get();
        return $query->result_array();
    }

    public function get_golongan_data()
    {
        $query = $this->db->select('golongan, COUNT(*) as jumlah')
            ->from('data_karyawan')
            ->group_by('golongan')
            ->get();
        return $query->result_array();
    }

    public function get_umur_ranges()
    {
        $query = $this->db->select('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur')
            ->from('data_karyawan')
            ->get();

        $data_pegawai = $query->result_array();
        $umur_ranges = [
            '21-30' => 0,
            '31-35' => 0,
            '36-40' => 0,
            '41-45' => 0,
            '46-50' => 0,
            '51-55' => 0,
            '56-60' => 0,
            '61-70' => 0,
        ];
        foreach ($data_pegawai as $pegawai) {
            $umur = $pegawai['umur'];

            if ($umur >= 21 && $umur <= 30) {
                $umur_ranges['21-30']++;
            } elseif ($umur >= 31 && $umur <= 35) {
                $umur_ranges['31-35']++;
            } elseif ($umur >= 36 && $umur <= 40) {
                $umur_ranges['36-40']++;
            } elseif ($umur >= 41 && $umur <= 45) {
                $umur_ranges['41-45']++;
            } elseif ($umur >= 46 && $umur <= 50) {
                $umur_ranges['46-50']++;
            } elseif ($umur >= 51 && $umur <= 55) {
                $umur_ranges['51-55']++;
            } elseif ($umur >= 56 && $umur <= 60) {
                $umur_ranges['56-60']++;
            } elseif ($umur >= 61 && $umur <= 70) {
                $umur_ranges['61-70']++;
            }
        }
        return $umur_ranges;
    }

    public function get_birthday_today_or_tomorrow()
    {
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));

        $this->db->select('id, nama, jenis_kelamin, pendidikan, tanggal_lahir, golongan, jabatan, TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur');
        $this->db->from('data_karyawan');
        $this->db->where("DATE_FORMAT(tanggal_lahir, '%m-%d') =", date('m-d')); // kalau ada yang ulang tahun hari ini
        $this->db->or_where("DATE_FORMAT(tanggal_lahir, '%m-%d') =", date('m-d', strtotime('+1 day'))); // kalau ada yang ulang tahun besok
        return $this->db->get()->result_array();
    }


    // dibawah ini sudah masuk ke Tindakan mengelola data karyawan
    public function insert_karyawan($data)
    {
        return $this->db->insert('data_karyawan', $data);
    }

    public function get_karyawan_by_id($id)
    {
        return $this->db->get_where('data_karyawan', ['id' => $id])->row_array();
    }

    public function update_karyawan($id, $data)
    {
        return $this->db->where('id', $id)->update('data_karyawan', $data);
    }

    public function delete_karyawan($id)
    {
        return $this->db->where('id', $id)->delete('data_karyawan');
    }

    // public function update_all_ages()
    // {
    //     $sql = "UPDATE data_karyawan 
    //         SET umur = TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE())";
    //     $this->db->query($sql);
    // }


    //untuk mengambil nilai enum yang telah di buat di db ( masih bingung jadi dibuat manual secara option)

    // public function get_enum_values($column)
    // {
    //     $query = $this->db->query("SHOW COLUMNS FROM data_karyawan WHERE Field = '$column'");
    //     $result = $query->row_array();
    //     $enum_values = array();
    //     preg_match('/^enum\((.*)\)$/', $result['Type'], $matches);

    //     if (isset($matches[1])) {
    //         $enum_values = explode(',', $matches[1]);
    //         $enum_values = array_map(function ($value) {
    //             return trim($value, "'");
    //         }, $enum_values);
    //     }

    //     return $enum_values;
    // }
    // 
}
