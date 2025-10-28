<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halmahasiswa extends BaseController
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
        $data['content']        = 'hal-c-mahasiswa';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman mahasiswa';
        $data['data_mahasiswa'] = $this->model_crud->tampilmahasiswa();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_mahasiswa)
    {  
        $data = [
            'content'          => 'hal-c-mahasiswa',
            'judul'            => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'        => 'Selamat datang di halaman mahasiswa',
            'detail_mahasiswa' => $this->model_crud->detailmahasiswa($id_mahasiswa),
            'data_mahasiswa'   => $this->model_crud->tampilmahasiswa(),
            'id_mahasiswa'     => $id_mahasiswa
        ];
        
                
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        
        $id_mahasiswa = $this->request->getPost('inputan_id_mahasiswa');
        
        $data = [
            'nim_mahasiswa'         => $this->request->getPost('inputan_nim'),
            'nama_mahasiswa'        => $this->request->getPost('inputan_nama'),
            'jk_mahasiswa'          => $this->request->getPost('inputan_jk'),
            'tgl_lahir_mahasiswa'   => $this->request->getPost('inputan_tgl_lahir'),
            'alamat_mahasiswa'      => $this->request->getPost('inputan_alamat')
        ];

        if(empty($id_mahasiswa)){
            //data baru
            $this->model_crud->simpanmahasiswa($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('halmahasiswa').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahmahasiswa($data, $id_mahasiswa);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('halmahasiswa').'"
            </script>';
        }
    }

    public function hapusdata($id_mahasiswa)
    {
        //hapus data
        $this->model_crud->hapusmahasiswa($id_mahasiswa);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('halmahasiswa').'"
            </script>';
    }
}