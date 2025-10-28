<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class ptransaksi extends BaseController
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
        $data['content']        = 'p-hal-transaksi';
        $data['judul']          = 'Laporan Data Transaksi';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_transaksi1'] = $this->model_crud->tampiltransaksi();
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        $data['data_dtran'] = $this->model_crud->detailtransaksi($id_transaksi);
        $data['data_datatransaksi'] = $this->model_crud->tampildatatransaksi();
        
        echo view('_applayout', $data);
    }

    public function laporantransaksi()
    {   
        date_default_timezone_set('Asia/Jakarta');
        $data['judul']          = 'Laporan Data Transaksi';
        $tgl_mulai   = $this->request->getPost('inputan_tgl_mulai');
        $tgl_selesai = $this->request->getPost('inputan_tgl_selesai');

        $data_transaksi = $this->db->query("SELECT * FROM transaksi, pengguna where transaksi.id_pengguna = pengguna.id_pengguna and tgl_transaksi between '$tgl_mulai' and '$tgl_selesai' ORDER BY id_transaksi DESC ")->getResultArray();

        $data = [
            'data_transaksi' => $data_transaksi,
            'judul' => 'Laporan Data Transaksi',
            'tanggal_cetak'  => date('d-m-Y')
        ];
        echo view('p-hal-transaksi', $data);
    }

}