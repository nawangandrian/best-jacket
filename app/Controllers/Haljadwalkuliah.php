<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haljadwalkuliah extends BaseController
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
        $data['content']        = 'hal-c-jadwalkuliah';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_jadwalkuliah'] = $this->model_crud->tampiljadwalkuliah();
        $data['data_mahasiswa'] = $this->model_crud->tampilmahasiswa();
        $data['data_dosen'] = $this->model_crud->tampildosen();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_jadwalkuliah)
    {  
        $data = [
            'content'             => 'hal-c-jadwalkuliah',
            'judul'               => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'           => 'Selamat datang di halaman jadwal kuliah',
            'detail_jadwalkuliah' => $this->model_crud->detailjadwalkuliah($id_jadwalkuliah),
            'data_jadwalkuliah'   => $this->model_crud->tampiljadwalkuliah(),
            'data_mahasiswa'      => $this->model_crud->tampilmahasiswa(),
            'data_dosen'          => $this->model_crud->tampildosen(),
            'id_jadwalkuliah'     => $id_jadwalkuliah
        ];
         
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_jadwalkuliah = $this->request->getPost('inputan_id_jadwalkuliah');
        
        $data = [
            'hari_kuliah'   => $this->request->getPost('inputan_hari'),
            'jam_kuliah'    => $this->request->getPost('inputan_jam_mulai').' s/d '.$this->request->getPost('inputan_jam_selesai'),
            'tempat_kuliah' => $this->request->getPost('inputan_tempat'),
            'tanggal_entri' => date('Y-m-d'),
            'id_mahasiswa'  => $this->request->getPost('inputan_mahasiswa'),
            'id_dosen'      => $this->request->getPost('inputan_dosen'),
        ];

        if(empty($id_jadwalkuliah)){
            //data baru
            $this->model_crud->simpanjadwalkuliah($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('haljadwalkuliah').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahjadwalkuliah($data, $id_jadwalkuliah);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('haljadwalkuliah').'"
            </script>';
        }
    }

    public function hapusdata($id_jadwalkuliah)
    {
        //hapus data
        $this->model_crud->hapusjadwalkuliah($id_jadwalkuliah);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('haljadwalkuliah').'"
            </script>';
    }
}