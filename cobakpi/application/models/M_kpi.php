<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kpi extends CI_Model{

    // nilai_kpi

    public function ambil_detail_kpi($id_karyawan, $tahun) {
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('nilai_kpi.tahun', $tahun);
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_detail_kpi_dalam($id_karyawan, $tahun) {
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('nilai_kpi.tahun', $tahun);
        $this->db->where('tipe_scorecard', 'dalam');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_detail_kpi_luar($id_karyawan, $tahun) {
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('nilai_kpi.tahun', $tahun);
        $this->db->where('tipe_scorecard', 'luar');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_detail_kpi_dalam2($id_pimpinan, $tahun) {
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('nilai_kpi_pimpinan.tahun', $tahun);
        $this->db->where('tipe_scorecard', 'dalam');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_detail_kpi_luar2($id_pimpinan, $tahun) {
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('nilai_kpi_pimpinan.tahun', $tahun);
        $this->db->where('tipe_scorecard', 'luar');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_item_kpi($id_divisi) {
        $this->db->where('id_divisi', $id_divisi);
        return $this->db->get('item_kpi')->result_array();
    }

    public function ambil_item_kpi_dalam($id_divisi) {
        $this->db->where('id_divisi', $id_divisi);
        $this->db->where('tipe_scorecard', 'dalam');
        return $this->db->get('item_kpi')->result_array();
    }

    public function ambil_item_kpi_luar($id_divisi) {
        $this->db->where('id_divisi', $id_divisi);
        $this->db->where('tipe_scorecard', 'luar');
        return $this->db->get('item_kpi')->result_array();
    }

    public function ambil_item_kpi_byid($id_item_kpi) {
        $this->db->where('id_item_kpi', $id_item_kpi);
        return $this->db->get('item_kpi')->result_array();
    }

    public function ambil_tahun_kpi($id_karyawan) {
        $this->db->select('bulan, tahun');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_tahun_kpi2($id_pimpinan) {
        $this->db->select('bulan, tahun');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_tahun_kpi_luar($id_karyawan) {
        $this->db->select('bulan, tahun');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('tipe_scorecard', 'luar');
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_tahun_kpi_luar2($id_pimpinan) {
        $this->db->select('bulan, tahun');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('tipe_scorecard', 'luar');
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_tahun_kpi_dalam($id_karyawan) {
        $this->db->select('bulan, tahun');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('tipe_scorecard', 'dalam');
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_tahun_kpi_dalam2($id_pimpinan) {
        $this->db->select('bulan, tahun');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('tipe_scorecard', 'dalam');
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_bulan_kpi_dalam2($id_pimpinan) {
        $this->db->select('bulan, tahun');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('tipe_scorecard', 'dalam');
        $this->db->group_by('bulan');
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_tahun_kpi_karyawan($id_divisi) {
        $this->db->select('tahun');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->where('karyawan.id_divisi', $id_divisi);
        $this->db->group_by('tahun');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_nilai_kpi($id_karyawan) {
        $this->db->select('id_nilai_kpi, nilai_kpi.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_nilai_kpi2($id_pimpinan) {
        $this->db->select('id_nilai_kpi, nilai_kpi_pimpinan.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_nilai_kpi_dalam($id_karyawan) {
        $this->db->select('id_nilai_kpi, nilai_kpi.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('tipe_scorecard', 'dalam');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_nilai_kpi_dalam2($id_pimpinan) {
        $this->db->select('id_nilai_kpi, nilai_kpi_pimpinan.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('tipe_scorecard', 'dalam');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function ambil_nilai_kpi_luar($id_karyawan) {
        $this->db->select('id_nilai_kpi, nilai_kpi.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('karyawan', 'karyawan.id_karyawan = nilai_kpi.id_karyawan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi.id_item_kpi');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
        $this->db->where('tipe_scorecard', 'luar');
        return $this->db->get('nilai_kpi')->result_array();
    }

    public function ambil_nilai_kpi_luar2($id_pimpinan) {
        $this->db->select('id_nilai_kpi, nilai_kpi_pimpinan.id_item_kpi, bobot_item, target_item, kategori, tahun, bulan, nilai');
        $this->db->join('pimpinan', 'pimpinan.id_pimpinan = nilai_kpi_pimpinan.id_pimpinan');
        $this->db->join('item_kpi', 'item_kpi.id_item_kpi = nilai_kpi_pimpinan.id_item_kpi');
        $this->db->where('pimpinan.id_pimpinan', $id_pimpinan);
        $this->db->where('tipe_scorecard', 'luar');
        return $this->db->get('nilai_kpi_pimpinan')->result_array();
    }

    public function tambah_nilai($data) {
        $this->db->insert('nilai_kpi', $data);
    }

    public function tambah_nilai_pimpinan($data) {
        $this->db->insert('nilai_kpi_pimpinan', $data);
    }

    public function edit_nilai($id_nilai_kpi, $nilai) {
        $this->db->set('nilai', $nilai);
        $this->db->where('id_nilai_kpi', $id_nilai_kpi);
        $this->db->update('nilai_kpi');
    }

    public function edit_nilai_pimpinan($id_nilai_kpi, $nilai) {
        $this->db->set('nilai', $nilai);
        $this->db->where('id_nilai_kpi', $id_nilai_kpi);
        $this->db->update('nilai_kpi_pimpinan');
    }

    public function edit_item_kpi($id_item_kpi, $data) {
        $this->db->where('id_item_kpi', $id_item_kpi);
        $this->db->update('item_kpi', $data);
    }
}