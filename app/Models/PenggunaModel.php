<?php
//format ada di dokumentasi ci4
namespace App\Models;

use CodeIgniter\Model;

class penggunaModel extends Model
{
    protected $table      = 'pengguna';    //nama tabel
    protected $primaryKey = 'id_pengguna';       //pkey
    
    
    protected $allowedFields = ['nama_pengguna', 'umur_pengguna','username','password','email_pengguna','no_telepon','gambar_profil']; //field yang boleh dimodifikasi user

    public function getPengguna($id_pengguna=false){//jika tidak ada nilai id yang diinput, nilai default adalah false
        if ($id_pengguna==false) {
            return $this->findAll();
        }
        else {
            return $this->where(['id_pengguna'=>$id_pengguna])->first();;  
        }
     
    }
    public function getPenggunaTanpaAdmin(){
        return $this->where('id_pengguna !=', 1)->findAll();
    }
    
}
