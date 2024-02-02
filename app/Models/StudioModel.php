<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table      = 'studio';    //nama tabel
    protected $primaryKey = 'id_studio';       //pkey
    
    
    protected $allowedFields = []; //field yang boleh dimodifikasi user

    public function getStudio($id_studio=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_studio==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_studio'=>$id_studio])->first();;  
        }
     
    }
}