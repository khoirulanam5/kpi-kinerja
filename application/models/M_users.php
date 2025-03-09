<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model{

    // users

    public function tambah_users($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function edit_users($id_users, $data) {
        $this->db->where('id_users', $id_users);
        $this->db->update('users', $data);
    }

    public function hapus_users($id_users) {
        $this->db->where('id_users', $id_users);
        $this->db->delete('users');
    }   

    // karyawan

    public function ambil_password($id_users) {
        $this->db->join('users', 'users.id_users = karyawan.id_users');
        $this->db->where('users.id_users', $id_users);
        return $this->db->get('karyawan')->row()->password;
    }

    public function ambil_profil_karyawan($id_users) {
        $this->db->join('users', 'users.id_users = karyawan.id_users');
        $this->db->where('users.id_users', $id_users);
        return $this->db->get('karyawan')->result_array();
    }

    public function ambil_karyawan_divisi($id_divisi) {
        $this->db->join('users', 'users.id_users = karyawan.id_users');
        $this->db->where('id_divisi', $id_divisi);
        return $this->db->get('karyawan')->result_array();
    }

    public function ambil_karyawan_pimpinan($id_pimpinan) {
        $this->db->join('users', 'users.id_users = karyawan.id_users');
        $this->db->where('id_pimpinan', $id_pimpinan);
        return $this->db->get('karyawan')->result_array();
    }

    public function ambil_karyawan_byjb1($jabatan1) {
        $this->db->join('users', 'users.id_users = pimpinan.id_users');
        $this->db->where('jabatan', $jabatan1);
        return $this->db->get('pimpinan')->result_array();
    }

    public function ambil_karyawan_byjb2($jabatan1, $jabatan2) {
        $this->db->join('users', 'users.id_users = pimpinan.id_users');
        $this->db->where('jabatan', $jabatan1);
        $this->db->or_where('jabatan', $jabatan2);
        return $this->db->get('pimpinan')->result_array();
    }

    public function ambil_id_karyawan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('karyawan')->row()->id_karyawan;
    }

    public function ambil_id_divisi_karyawan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('karyawan')->row()->id_divisi;
    }

    public function ambil_nama_karyawan($id_users) {
    	$this->db->where('id_users', $id_users);
        return $this->db->get('karyawan')->row()->nama_karyawan;
    }

    public function ambil_nama_karyawan_byid($id_karyawan) {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->get('karyawan')->row()->nama_karyawan;
    }

    public function ambil_jabatan_karyawan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('karyawan')->row()->jabatan;
    }

    public function ambil_jumlah_karyawan() {
        return $this->db->get('karyawan')->num_rows();
    }

    public function ambil_divisi_karyawan($id_users) {
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi');
        $this->db->where('id_users', $id_users);
        return $this->db->get('karyawan')->row()->nama_divisi;
    }

    public function tambah_karyawan($data) {
        $this->db->insert('karyawan', $data);
    }

    public function edit_karyawan($id_karyawan, $data) {
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->update('karyawan', $data);
    }

    // pimpinan

    public function ambil_profil_pimpinan($id_users) {
        $this->db->join('users', 'users.id_users = pimpinan.id_users');
        $this->db->where('users.id_users', $id_users);
        return $this->db->get('pimpinan')->result_array();
    }

    public function ambil_id_pimpinan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('pimpinan')->row()->id_pimpinan;
    }

    public function ambil_id_divisi_pimpinan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('pimpinan')->row()->id_divisi;
    }

    public function ambil_nama_pimpinan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('pimpinan')->row()->nama_pimpinan;
    }

    public function ambil_nama_pimpinan2($id_pimpinan) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        return $this->db->get('pimpinan')->row()->nama_pimpinan;
    }

    public function ambil_jabatan_pimpinan($id_users) {
        $this->db->where('id_users', $id_users);
        return $this->db->get('pimpinan')->row()->jabatan;
    }

    public function ambil_divisi_pimpinan($id_users) {
        $this->db->join('divisi', 'divisi.id_divisi = pimpinan.id_divisi');
        $this->db->where('id_users', $id_users);
        return $this->db->get('pimpinan')->row()->nama_divisi;
    }

    public function ambil_jumlah_pimpinan() {
        return $this->db->get('pimpinan')->num_rows();
    }

    public function tambah_pimpinan($data) {
        $this->db->insert('pimpinan', $data);
        return $this->db->insert_id();
    }

    public function edit_pimpinan($id_pimpinan, $data) {
        $this->db->where('id_pimpinan', $id_pimpinan);
        $this->db->update('pimpinan', $data);
    }
}