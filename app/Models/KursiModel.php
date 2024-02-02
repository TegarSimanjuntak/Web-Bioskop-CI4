<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class kursiModel extends Model
{
    protected $table      = 'kursi';    //nama tabel
    protected $primaryKey = 'id_kursi';       //pkey
    
    
    protected $allowedFields = []; //field yang boleh dimodifikasi user

    public function getKursi($id_kursi=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_kursi==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_kursi'=>$id_kursi])->first();;  
        }
     
    }
}