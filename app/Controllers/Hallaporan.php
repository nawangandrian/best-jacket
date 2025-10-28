<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Hallaporan extends BaseController
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
        $data['content']        = 'hal-c-laporan';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman laporan';
            
        echo view('_applayout', $data);
    }

    public function laporanjadwalkuliah()
    {   
        date_default_timezone_set('Asia/Jakarta');
        $tgl_mulai   = $this->request->getPost('inputan_tgl_mulai');
        $tgl_selesai = $this->request->getPost('inputan_tgl_selesai');

        $data = [
            'data_jadwalkuliah' => $this->db->query("SELECT * FROM jadwal_kuliah, mahasiswa, dosen where jadwal_kuliah.id_mahasiswa = mahasiswa.id_mahasiswa and jadwal_kuliah.id_dosen = dosen.id_dosen and tanggal_entri between '$tgl_mulai' and '$tgl_selesai' ORDER BY id_jadwalkuliah DESC ")->getResultArray(),
            'tanggal_cetak'     => date('d-m-Y'),
        ];
        echo view('cetak-laporan-jadwalkuliah', $data);
    }

}