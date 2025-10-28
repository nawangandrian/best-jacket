<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haltransaksi extends BaseController
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
        $data['content']        = 'hal_transaksi';
        $data['judul']          = 'Input Transaksi';
        $data['sub_judul']      = 'Selamat datang di halaman jadwal kuliah';
        $data['data_transaksi'] = $this->model_crud->tampiltransaksi();
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        $data['data_produk'] = $this->model_crud->tampilproduk();
        $data['data_detail'] = $this->model_crud->tampildetail();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_transaksi)
    {  
        $data = [
            'content'             => 'hal_transaksi',
            'judul'               => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'           => 'Selamat datang di halaman jadwal kuliah',
            'detail_transaksi'    => $this->model_crud->detailtransaksi($id_transaksi),
            'data_transaksi'      => $this->model_crud->tampiltransaksi(),
            'data_pengguna'       => $this->model_crud->tampilpengguna(),
            'data_produk'         => $this->model_crud->tampilproduk(),
            'data_detail'         => $this->model_crud->tampildetail(),
            'id_transaksi'        => $id_transaksi,
        ];
         
        echo view('_applayout', $data);
    }

    // Contoh di controller

    public function keranjang_barang()
    {
        
        $data = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'ukuran_produk' => strtoupper($this->request->getPost('ukuran_produk')),
            'jumlah' => $this->request->getPost('jumlah'),
            'sub_total' => $this->request->getPost('sub_total'),
        ];

        echo view('keranjang', $data);
    }

    public function simpandata()
    {
        date_default_timezone_set('Asia/Jakarta');
        
        $id_transaksi = $this->request->getPost('inputan_id_transaksi');
        $jam_transaksi = $this->request->getPost('inputan_jam_transaksi');
        $total_transaksi = $this->request->getPost('inputan_total_transaksi');
        $id_pengguna = $this->request->getPost('inputan_id_pengguna');

        // Data is complete, proceed with saving
        $data_transaksi = [
            'id_transaksi'    => $id_transaksi,
            'jam_transaksi'   => $jam_transaksi,
            'tgl_transaksi'   => date('Y-m-d'), // Assuming your database date format is 'Y-m-d'
            'total_transaksi' => $total_transaksi,
            'id_pengguna'     => $id_pengguna,
        ];

        // Simpan data transaksi
        if ($id_transaksi) {
            // Data baru
            $this->model_crud->simpantransaksi($data_transaksi);
        } else {
            // Ubah data
            $this->model_crud->ubahtransaksi($data_transaksi, $id_transaksi);
        }

        // Simpan data detail transaksi
        $idproduk = $this->request->getPost('id_produk_hidden');
        $harga = $this->request->getPost('harga_produk_hidden');
        $nama_produk = $this->request->getPost('nama_produk_hidden');
        $jumlah = $this->request->getPost('jumlah_hidden');
        $ukuran = $this->request->getPost('ukuran_produk_hidden');
        $subtotal = $this->request->getPost('sub_total_hidden');

        // Buat array berisi data yang akan dicek
        $dataToCheck = [$idproduk, $harga, $nama_produk, $jumlah, $ukuran, $subtotal];

        // Hapus elemen array yang kosong
        $dataToCheck = array_map('array_filter', $dataToCheck);

        // Pengecekan nilai-nilai dari hasil filter menggunakan var_dump
        //echo 'ID Produk: '; var_dump($dataToCheck[0]); echo '<br>';
        //echo 'Harga Produk: '; var_dump($dataToCheck[1]); echo '<br>';
        //echo 'Jumlah: '; var_dump($dataToCheck[3]); echo '<br>';
        //echo 'Ukuran: '; var_dump($dataToCheck[4]); echo '<br>';
        //echo 'Sub Total: '; var_dump($dataToCheck[5]); echo '<br>';

        // Ambil data yang sudah difilter dari array
        $idproduk = $dataToCheck[0];
        $harga = $dataToCheck[1];
        $nama_produk = $dataToCheck[2];
        $jumlah = $dataToCheck[3];
        $ukuran = $dataToCheck[4];
        $subtotal = $dataToCheck[5];

        // Data is complete, proceed with saving
        for ($i = 0; $i < count($idproduk); $i++) {
            $data_detail = [
                'id_transaksi' => $id_transaksi,
                'id_produk'    => $idproduk[$i],
                'harga_produk' => $harga[$i],
                'ukuran_produk'=> $ukuran[$i], 
                'jumlah'       => $jumlah[$i],
                'sub_total'    => $subtotal[$i],
            ];

            // Simpan data detail transaksi
            $this->model_crud->simpandetail($data_detail);
            $this->model_crud->minstok($idproduk[$i], $jumlah[$i]);
        }

        echo '<script>
           alert("Selamat! Berhasil Menambah Data");
            window.location = "' . base_url('haltransaksi') . '"
        </script>';
    }

    public function hapusdata($id_transaksi)
    {
        //hapus data
        $this->model_crud->hapustransaksi($id_transaksi);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('haltransaksi').'"
            </script>';
    }

    public function hapusdata_detail($id_transaksi)
    {
        //hapus data
        $this->model_crud->hapusdetail($id_transaksi);
    }

    public function get_produk_detail(){
        $data = $this->model_crud->tampil_produk_detail($_POST['nama_produk']);
        echo json_encode($data);
    }
    
}