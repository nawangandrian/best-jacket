<?php
namespace App\Models;
use CodeIgniter\Model;
 
class crud extends Model
{

    //--------------------------------------- create atau simpan data baru --------------------------------------------- 
    public function cekUsername($username)
    {
        // Mengembalikan jumlah baris yang memiliki username yang sama
        return $this->db->table('pengguna')->where('nama_pengguna', $username)->countAllResults() > 0;
    }

    public function simpanpengguna($data)
    {
        return $this->db->table('pengguna')->insert($data);
    }

    public function simpandetail($data_detail)
    {
        return $this->db->table('detail')->insert($data_detail);
    }

    public function simpanproduk($data)
    {
        return $this->db->table('produk')->insert($data);
    }

    public function simpantransaksi($data)
    {
        return $this->db->table('transaksi')->insert($data);
    }

    public function tambah($data){
		return $this->db->table('detail')->insert_batch($data);
	}

    //--------------------------------------------- read atau tampil data --------------------------------------------- 
    public function tampilpengguna()
    {
        return $this->db->table('pengguna')->select('*')->orderBy('id_pengguna', 'Desc')->get()->getResultArray();
    }

    public function tampildetail()
    {
        return $this->db->table('detail')->select('*')->orderBy('id_detail', 'Desc')->get()->getResultArray();
    }

    public function tampilproduk()
    {
        return $this->db->table('produk')->select('*')->orderBy('id_produk', 'Desc')->get()->getResultArray();
    }

    public function tampilproduk1($jenis_produk = null)
    {
        echo 'Jenis: '; var_dump($jenis_produk); echo '<br>';
        
        $builder = $this->db->table('produk')->select('*')->orderBy('id_produk', 'DESC');
        
        // Jika jenis_produk tidak null, tambahkan kondisi filter
        if ($jenis_produk !== null) {
            $builder->where('jenis_produk', $jenis_produk);
            echo 'Jenis1: '; var_dump($jenis_produk); echo '<br>';
        }

        // Variabel $nama_produk tidak didefinisikan di sini, mungkin Anda ingin menghapusnya
        // echo 'Nama: '; var_dump($nama_produk); echo '<br>';

        // Ambil hasil query
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function tampiltransaksi()
    {
        return $this->db->query("SELECT * FROM transaksi, pengguna where transaksi.id_pengguna = pengguna.id_pengguna ORDER BY id_transaksi DESC ")->getResultArray();
    }

    public function tampil_produk_detail($nama_produk) {
        $data = $this->db->table('produk')->select('*')->where('nama_produk', $nama_produk)->get()->getRow();
    
        return $data;
    }    

    public function tampildatatransaksi()
    {
        return $this->db->query("SELECT * FROM transaksi
                                INNER JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna
                                INNER JOIN detail ON transaksi.id_transaksi = detail.id_transaksi
                                INNER JOIN produk ON detail.id_produk = produk.id_produk
                                ORDER BY transaksi.id_transaksi DESC ")->getResultArray();
    }

    public function tampilpenjualan() {
        return $this->db->query("SELECT * FROM transaksi
                                 INNER JOIN detail ON transaksi.id_transaksi = detail.id_transaksi
                                 INNER JOIN produk ON detail.id_produk = produk.id_produk
                                 ORDER BY produk.id_produk DESC ")->getResultArray();
    }             

    //--------------------------------------------- read atau detail data --------------------------------------------- 
    public function detailpengguna($id_pengguna)
    {
        return $this->db->query("SELECT * FROM pengguna where id_pengguna = '$id_pengguna' ")->getRow();
    }

    public function detaildetail($id_detail)
    {
        return $this->db->query("SELECT * FROM detail where id_detail = '$id_detail' ")->getRow();
    }

    public function detailproduk($id_produk)
    {
        return $this->db->query("SELECT * FROM produk where id_produk = '$id_produk' ")->getRow();
    }

    public function detailtransaksi($id_transaksi)
    {
        return $this->db->query("SELECT * FROM transaksi, pengguna where transaksi.id_pengguna = pengguna.id_pengguna and id_transaksi = '$id_transaksi' ")->getRow();
    }

    public function detaildatatransaksi($id_transaksi)
    {
        return $this->db->query("
            SELECT * 
            FROM transaksi 
            JOIN pengguna ON transaksi.id_pengguna = pengguna.id_pengguna
            JOIN detail ON transaksi.id_transaksi = detail.id_transaksi
            JOIN produk ON detail.id_produk = produk.id_produk
            WHERE transaksi.id_transaksi = '$id_transaksi'
        ")->getResultArray();
    }


    //--------------------------------------------- update atau ubah data --------------------------------------------- 
    public function ubahpengguna($data, $id_pengguna)
    {
        return $this->db->table('pengguna')->update($data, array('id_pengguna' => $id_pengguna));
    }

    public function ubahdetail($data, $id_transaksi)
    {
        return $this->db->table('detail')->update($data, array('id_transaksi' => $id_transaksi));
    }

    public function ubahproduk($data, $id_produk)
    {
        return $this->db->table('produk')->update($data, array('id_produk' => $id_produk));
    }

    public function ubahtransaksi($data, $id_transaksi)
    {
        return $this->db->table('transaksi')->update($data, array('id_transaksi' => $id_transaksi));
    }

    public function minstok($idproduk, $stok)
    {
        //echo 'Id: '; var_dump($idproduk); echo '<br>';
        //echo 'Stok: '; var_dump($stok); echo '<br>';
        // Ambil stok_produk sekarang
        $current_stok = $this->db->query("SELECT stok_produk FROM produk where id_produk = '$idproduk' ")->getRow();
        //echo 'current stok: '; var_dump($current_stok); echo '<br>';
        // Kurangi stok_produk berdasarkan jumlah_terjual
        $new_stok = $current_stok->stok_produk - $stok;
        //echo 'new stok: '; var_dump($new_stok); echo '<br>';
        // Update stok_produk baru ke dalam database
        return $this->db->query("UPDATE produk SET stok_produk = $new_stok WHERE id_produk = '$idproduk'");
    }

    //--------------------------------------------- delete atau hapus data --------------------------------------------- 
    public function hapuspengguna($id_pengguna)
    {
        return $this->db->table('pengguna')->delete(array('id_pengguna' => $id_pengguna));
    }

    public function hapusdetail($id_transaksi)
    {
        return $this->db->table('detail')->delete(array('id_transaksi' => $id_transaksi));
    }

    public function hapusproduk($id_produk)
    {
        return $this->db->table('produk')->delete(array('id_produk' => $id_produk));
    }

    public function hapustransaksi($id_transaksi)
    {
        return $this->db->table('transaksi')->delete(array('id_transaksi' => $id_transaksi));
    }

    public function hapusdetailtransaksi($id_transaksi)
    {
        return $this->db->table('detail')->delete(['id_transaksi' => $id_transaksi]);
    }

}