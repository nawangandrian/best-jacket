<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halproduk extends BaseController
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
        $data['content']    = 'hal-c-produk';
        $data['judul']      = 'Data Produk';
        $data['sub_judul1'] = 'Aplikasi Manajamen Jaket Ci4';
        $data['sub_judul']  = 'Halaman Produk';
        $data['data_produk'] = $this->model_crud->tampilproduk();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_produk)
    {  
        $data = [
            'content'      => 'hal-c-produk',
            'judul'        => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'    => 'Selamat datang di halaman dosen',
            'detail_produk' => $this->model_crud->detailproduk($id_produk),
            'data_produk'   => $this->model_crud->tampilproduk(),
            'id_produk'     => $id_produk
        ];
                
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if(!empty($inputan_foto->getBasename())){
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-produk/', $berkas_foto);
        }else{
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }

        $id_produk = $this->request->getPost('inputan_id_produk');
        
        $data = [
            'nama_produk'  => $this->request->getPost('inputan_nama_produk'),
            'jenis_produk'  => $this->request->getPost('inputan_jenis_produk'),
            'ukuran_produk'  => $this->request->getPost('inputan_ukuran_produk'),
            'stok_produk'  => $this->request->getPost('inputan_stok_produk'),
            'harga_produk'  => $this->request->getPost('inputan_harga_produk'),
            'foto_produk'  => $berkas_foto,
        ];

        if(empty($id_produk)){
            //data baru
            $this->model_crud->simpanproduk($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('halproduk').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahproduk($data, $id_produk);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('halproduk').'"
            </script>';
        }
        
    }

    public function updateproduk($id_produk) {
        $inputan_foto = $this->request->getFile('inputan_foto');
        $nama_foto_tersimpan = $this->request->getPost('nama_foto_tersimpan');
    
        if (!empty($inputan_foto->getBasename())) {
            // Jika ada file foto baru diunggah
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-produk/', $berkas_foto);
    
            // Hapus foto lama jika ada
            if (!empty($nama_foto_tersimpan)) {
                unlink(ROOTPATH . 'public/foto-produk/' . $nama_foto_tersimpan);
            }
        } else {
            // Jika tidak ada file foto baru diunggah, gunakan foto yang sudah ada
            $berkas_foto = $nama_foto_tersimpan;
        }
    
        // Data yang diharapkan
        $data = array(
            // Isi dengan elemen data yang lain
            'nama_produk' => $this->request->getPost('inputan_nama_produk'),
            'jenis_produk' => $this->request->getPost('inputan_jenis_produk'),
            'ukuran_produk' => $this->request->getPost('inputan_ukuran_produk'),
            'stok_produk' => $this->request->getPost('inputan_stok_produk'),
            'harga_produk' => $this->request->getPost('inputan_harga_produk'),
            'foto_produk'  => $berkas_foto,
        );
    
        // Ubah data di database
        $model_crud = new crud;
        $this->model_crud->ubahproduk($data, $id_produk);
    
        echo '<script>
        alert("Selamat! Berhasil Mengubah Data");
        window.location = "'.base_url('halproduk').'"
        </script>';
    }    

    public function hapusdata($id_produk)
    {
        //hapus data
        $this->model_crud->hapusproduk($id_produk);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('halproduk').'"
            </script>';
    }
}