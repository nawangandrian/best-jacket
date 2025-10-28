<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halmasuk extends BaseController
{
    public function __construct()
    {
        //variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();

        //variabel session
        $this->session = session();
    }

    public function index()
    {
        $data['judul']          = 'Halaman Masuk';
        $data['sub_judul']      = 'Selamat datang di Aplikasi Ci4';
        
        if(empty($this->session->get('id_pengguna'))) {
            echo view('hal-masuk', $data);
        } 
        
    }

    public function autentifikasi()
    {
        $nama_pengguna = $this->request->getPost('inputan_nama_pengguna');
        $pw_pengguna = $this->request->getPost('inputan_pw_pengguna');

        // Mencari data pengguna
        $data_pengguna = $this->db->query("SELECT * FROM pengguna WHERE nama_pengguna = '$nama_pengguna' AND pw_pengguna = '$pw_pengguna' ")->getRow();

        if (!empty($data_pengguna->id_pengguna)) {
            // Jika data pengguna ditemukan, sistem akan menyimpan data session pengguna
            $simpan_session = [
                'id_pengguna'     => $data_pengguna->id_pengguna,
                'nama_pengguna'   => $data_pengguna->nama_pengguna,
                'pw_pengguna'     => $data_pengguna->pw_pengguna,
                'jk_pengguna'     => $data_pengguna->jk_pengguna,
                'alamat_pengguna' => $data_pengguna->alamat_pengguna,
                'hak_akses'       => $data_pengguna->hak_akses,
            ];

            // Menyimpan data session pengguna
            $this->session->set($simpan_session);

            // Pengecekan apakah id_pengguna sudah diatur dalam sesi
            if ($this->session->has('id_pengguna')) {
                echo '<script>alert("Selamat! Berhasil masuk ke sistem"); window.location = "' . base_url('halberanda') . '"</script>';
            } else {
                echo '<script>alert("Maaf, terjadi kesalahan dalam menyimpan sesi"); window.location = "' . base_url('halmasuk') . '"</script>';
            }

        } else {
            // Jika data pengguna tidak ditemukan
            echo '<script>alert("Maaf, gagal masuk ke sistem :( "); window.location = "' . base_url('halmasuk') . '"</script>';
        }
    }

    public function keluar()
    { 
        $this->session->destroy();
        echo 
            '<script>
                alert("Keluar dari sistem");
                window.location = "'.base_url('home').'"
            </script>';
    }

}