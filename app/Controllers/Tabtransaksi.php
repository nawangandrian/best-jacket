<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Tabtransaksi extends BaseController
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
        $data['content']        = 'tab_transaksi';
        $data['judul']          = 'Data Transaksi';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_transaksi'] = $this->model_crud->tampiltransaksi();
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_transaksi)
    {  
        $data = [
            'content'             => 'tab_transaksi',
            'judul'               => 'Data Transaksi',
            'sub_judul'           => 'Selamat datang di halaman jadwal kuliah',
            'detail_transaksi' => $this->model_crud->detailtransaksi($id_transaksi),
            'data_transaksi'   => $this->model_crud->tampiltransaksi(),
            'data_pengguna'      => $this->model_crud->tampilpengguna(),
            'id_transaksi'     => $id_transaksi
        ];
         
        echo view('_applayout', $data);
    }

    public function hapusdata($id_transaksi)
    {
        //hapus data
        $this->model_crud->hapustransaksi($id_transaksi);
        $this->model_crud->hapusdetail($id_transaksi);
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('tabtransaksi').'"
            </script>';
    }
}