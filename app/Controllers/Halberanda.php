<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halberanda extends BaseController
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
        $query_jumlah_jadwalkuliah = $this->db->query("SELECT count(id_jadwalkuliah) as jumlah_data from jadwal_kuliah ")->getRow();
        $query_jumlah_mahasiswa = $this->db->query("SELECT count(id_mahasiswa) as jumlah_data from mahasiswa ")->getRow();
        $query_jumlah_dosen = $this->db->query("SELECT count(id_dosen) as jumlah_data from dosen ")->getRow();
        $query_jumlah_pengguna = $this->db->query("SELECT count(id_pengguna) as jumlah_data from pengguna ")->getRow();

        $query_dt_terakhir_jadwalkuliah = $this->db->query("SELECT * from jadwal_kuliah order by id_jadwalkuliah DESC")->getRow();
        $query_dt_terakhir_mahasiswa = $this->db->query("SELECT * from mahasiswa order by id_mahasiswa DESC")->getRow();
        $query_dt_terakhir_dosen = $this->db->query("SELECT * from dosen order by id_dosen DESC")->getRow();
        $query_dt_terakhir_pengguna = $this->db->query("SELECT * from pengguna order by id_pengguna DESC")->getRow();

        $data['content']        = 'hal-c-beranda';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman beranda';
        $data['jumlah_data_jadwalkuliah']   = $query_jumlah_jadwalkuliah->jumlah_data;
        $data['jumlah_data_mahasiswa']      = $query_jumlah_mahasiswa->jumlah_data;
        $data['jumlah_data_dosen']          = $query_jumlah_dosen->jumlah_data;
        $data['jumlah_data_pengguna']       = $query_jumlah_pengguna->jumlah_data;
        $data['dt_terakhir_jadwalkuliah']   = $query_dt_terakhir_jadwalkuliah->tempat_kuliah.', '.$query_dt_terakhir_jadwalkuliah->hari_kuliah.' ('.$query_dt_terakhir_jadwalkuliah->jam_kuliah.')';
        $data['dt_terakhir_mahasiswa']      = $query_dt_terakhir_mahasiswa->nama_mahasiswa;
        $data['dt_terakhir_dosen']          = $query_dt_terakhir_dosen->nama_dosen;
        $data['dt_terakhir_pengguna']       = $query_dt_terakhir_pengguna->nama_pengguna;
        $data['data_produk'] = $this->model_crud->tampilproduk();
        $data['data_penjualan'] = $this->model_crud->tampilpenjualan();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_produk)
    {  
        $data = [
            'content'      => 'hal-c-beranda',
            'judul'        => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'    => 'Selamat datang di halaman beranda',
            'detail_produk' => $this->model_crud->detailproduk($id_produk),
            'data_produk'   => $this->model_crud->tampilproduk(),
            'id_produk'     => $id_produk
        ];
                
        echo view('_applayout', $data);
    }

    public function daftarproduk()
    {
        // Mengambil jenis_produk dari URL
        $jenis_produk = $this->request->uri->getSegment(3);

        // Mengambil semua data produk sesuai jenis_produk
        $data_produk = $this->model_crud->tampilproduk1($jenis_produk);

        // Mengatur data untuk dikirim ke view
        $data = [
            'data_produk' => $data_produk, // Perbaikan variabel
            'jenis_produk' => $jenis_produk,
            'content' => 'hal-c-beranda', // Tentukan konten yang ingin ditampilkan
        ];

        // Menampilkan view dengan data
        echo view('_applayout', $data);
    }

}