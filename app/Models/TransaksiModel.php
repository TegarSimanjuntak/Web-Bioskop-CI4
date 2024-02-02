<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table      = 'transaksi';    //nama tabel
    protected $primaryKey = 'id_transaksi';       //pkey
    
    
    protected $allowedFields = [
    'id_pengguna',
    'id_studio' ,
    'id_kursi',
    'id_film',
    'id_jadwal']; //field yang boleh dimodifikasi user

    public function getTransaksi($id_transaksi=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_transaksi==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_transaksi'=>$id_transaksi])->first();;  
        }
    }
    public function getTransaksibyUser($id_pengguna)
    {
        return $this->where('id_pengguna', $id_pengguna)->findAll();
    }
}