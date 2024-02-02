<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class filmModel extends Model
{
    protected $table      = 'film';    //nama tabel
    protected $primaryKey = 'id_film';       //pkey
    
    
    protected $allowedFields = ['nama_film', 'gambar','tahun_rilis','deskripsi_film','trailer_film','status']; //field yang boleh dimodifikasi user

    public function getFilm($id_film=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_film==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_film'=>$id_film])->first();;  
        }
     
    }
    public function getFilmAktif($id_film=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_film==false) {
            return $this->where('status', 1)->findAll();
        }
        else {
            return $this->where(['id_film' => $id_film, 'status' => 1])->first();
        }
     
    }
    public function search($keyword){
        $builder = $this->table('film');
        $builder->like('nama_film',$keyword);
        return $builder;
    }
}