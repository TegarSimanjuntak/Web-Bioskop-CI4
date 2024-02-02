<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class jadwalModel extends Model
{
    protected $table      = 'jadwal';    //nama tabel
    protected $primaryKey = 'id_jadwal';       //pkey
    
    
    protected $allowedFields = ['id_jadwal','id_film','tanggal_tayang','jam_tayang','jam_selesai','id_studio','status']; //field yang boleh dimodifikasi user

    public function getJadwal($id_jadwal=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_jadwal==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_jadwal'=>$id_jadwal])->first();;  
        }
     
    }
    public function getJadwalByIdFilm($id_film)
    {
        return $this->where(['id_film' => $id_film, 'status' => 1])->findAll();
    }
}