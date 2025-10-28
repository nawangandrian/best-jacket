<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haldetail extends BaseController
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
        $data['content']        = 'hal-c-detail';
        $data['judul']          = 'Detail Data Transaksi';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_detail'] = $this->model_crud->tampildetail();
        $data['data_produk'] = $this->model_crud->tampilproduk();
        $data['data_transaksi'] = $this->model_crud->tampiltransaksi();
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_transaksi)
    {  
        $data = [
            'content'             => 'hal-c-detail',
            'judul'               => 'Data Transaksi',
            'sub_judul'           => 'Selamat datang di halaman jadwal kuliah',
            
            'data_dtransaksi'       => $this->model_crud->tampildatatransaksi(),
            'data_transaksi'       => $this->model_crud->tampiltransaksi(),
            'data_detail'          => $this->model_crud->tampildetail(),
            'data_produk'          => $this->model_crud->tampilproduk(),
            'data_pengguna'        => $this->model_crud->tampilpengguna(),
            'id_transaksi'         => $id_transaksi
        ];
         
        echo view('_applayout', $data);
    }

    public function tampilltran()
    {
        $id_transaksi = $this->request->getGet('id_transaksi');
        
        // Mengambil data detail transaksi berdasarkan ID transaksi
        $data['detail_datatransaksi'] = $this->model_crud->detaildatatransaksi($id_transaksi);
        
        // Pengecekan apakah data ditemukan
        if (!$data['detail_datatransaksi']) {
            echo '<script>
                    alert("Data tidak ditemukan");
                    window.location = "'.base_url('tabtransaksi').'";
                </script>';
            return;
        }

        // Set data untuk view
        $data['content'] = 'hal-c-detail';
        
        // Menampilkan view dengan data detail transaksi
        echo view('_applayout', $data);
    } 

}