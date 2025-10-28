<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class pjual extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();
        
        //membuat variabel baru untuk menggunakan models crud.php
        $this->model_crud = new crud;

    }

    public function index()
    {
        $data['content']        = 'p-hal-jual';
        $data['judul']          = 'Laporan Penjualan';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_penjualan'] = $this->model_crud->tampilpenjualan();
        $data['data_produk']    = $this->model_crud->tampilproduk();
        $data['data_detail']    = $this->model_crud->tampildetail();
        $data['data_transaksi'] = $this->model_crud->tampiltransaksi();

        echo view('_applayout', $data);
    }

}