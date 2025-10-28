<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haluser extends BaseController
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
        $data['content']        = 'hal-c-user';
        $data['judul']          = 'Data Pengguna';
        $data['sub_judul1']     = 'Aplikasi Manajamen Jaket Ci4';
        $data['sub_judul']      = 'Halaman Pengguna';
        $data['data_pengguna']  = $this->model_crud->tampilpengguna();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_pengguna)
    {  
        $data = [
            'content'      => 'hal-c-user',
            'judul'        => 'Selamat datang di !!!',
            'sub_judul1'   => 'Aplikasi Manajamen Jaket Ci4',
            'sub_judul'    => 'Halaman Pengguna',
            'detail_pengguna' => $this->model_crud->detailpengguna($id_pengguna),
            'data_pengguna'   => $this->model_crud->tampilpengguna(),
            'id_pengguna'     => $id_pengguna
        ];

        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        
        $id_pengguna = $this->request->getPost('inputan_id_pengguna');
        $username = $this->request->getPost('inputan_nama_pengguna');
        
        // Cek apakah username sudah ada dalam tabel user
        $userExists = $this->model_crud->cekUsername($username);

        if ($userExists && empty($id_pengguna)) {
            // Jika username sudah ada dan ini adalah data baru
            echo '<script>
                alert("Maaf, nama pengguna sudah ada. Silakan pilih nama pengguna lain.");
                window.location = "'.base_url('haluser').'"
            </script>';
        }else{
        $data = [
            'nama_pengguna'  => $this->request->getPost('inputan_nama_pengguna'),
            'pw_pengguna'  => $this->request->getPost('inputan_pw_pengguna'),
            'jk_pengguna'  => $this->request->getPost('inputan_jk_pengguna'),
            'alamat_pengguna'  => $this->request->getPost('inputan_alamat_pengguna'),
            'hak_akses' => $this->request->getPost('inputan_hak_akses')
        ];
        

        if(empty($id_pengguna)){
            //data baru
            $this->model_crud->simpanpengguna($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('haluser').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahpengguna($data, $id_pengguna);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('haluser').'"
            </script>';
        }
    }
}

    public function hapusdata($id_pengguna)
    { 
        //hapus data
        $this->model_crud->hapuspengguna($id_pengguna);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('haluser').'"
            </script>';
    }
}