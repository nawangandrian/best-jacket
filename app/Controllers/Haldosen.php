<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haldosen extends BaseController
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
        $data['content']    = 'hal-c-dosen';
        $data['judul']      = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']  = 'Selamat datang di halaman dosen';
        $data['data_dosen'] = $this->model_crud->tampildosen();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_dosen)
    {  
        $data = [
            'content'      => 'hal-c-dosen',
            'judul'        => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'    => 'Selamat datang di halaman dosen',
            'detail_dosen' => $this->model_crud->detaildosen($id_dosen),
            'data_dosen'   => $this->model_crud->tampildosen(),
            'id_dosen'     => $id_dosen
        ];
                
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if(!empty($inputan_foto->getBasename())){
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-dosen/', $berkas_foto);
        }else{
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }

        $id_dosen = $this->request->getPost('inputan_id_dosen');
        
        $data = [
            'nidn_dosen'  => $this->request->getPost('inputan_nidn'),
            'nama_dosen'  => $this->request->getPost('inputan_nama'),
            'foto_dosen'  => $berkas_foto,
        ];

        if(empty($id_dosen)){
            //data baru
            $this->model_crud->simpandosen($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('haldosen').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahdosen($data, $id_dosen);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('haldosen').'"
            </script>';
        }
        
    }

    public function hapusdata($id_dosen)
    {
        //hapus data
        $this->model_crud->hapusdosen($id_dosen);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('haldosen').'"
            </script>';
    }
}