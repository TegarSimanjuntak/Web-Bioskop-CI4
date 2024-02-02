<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\PenggunaModel;
use App\Models\jadwalModel;
use App\Models\kursiModel;
use App\Models\transaksiModel;
use CodeIgniter\Database\Query;

class User extends BaseController
{
    protected $filmModel;
    protected $penggunaModel;
    protected $jadwalModel;
    protected $kursiModel;
    protected $transaksiModel;
    public function __construct()   
    {
        $this->filmModel=new FilmModel();
        $this->penggunaModel=new PenggunaModel();
        $this->jadwalModel=new jadwalModel();
        $this->kursiModel=new kursiModel();
        $this->transaksiModel=new transaksiModel();
    }

    public function index()
    {
        $id_pengguna = $this->request->getVar('id_pengguna');

        if ($id_pengguna == 1) {
            return redirect()->to('/admin');
        } else {
            $data = [
                'title' => 'Beranda',
                'film' => $this->filmModel->getFilmAktif() //semua dikirim karena tidak ada parameter
            ];
            return view('user/beranda', $data);
        }
    }

    public function login()
    {
        $data = [
            'user' => $this->penggunaModel->getPengguna()
        ];

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        foreach ($data['user'] as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                session()->set('login', true);
                session()->set('id_pengguna', $user['id_pengguna']);

                if ($user['id_pengguna'] == 1) {
                    return redirect()->to('/admin/dataFilm');
                } else {
                    return redirect()->to('/');
                }
            }
        }

        // Jika tidak ada data pengguna yang cocok, tampilkan pesan error
        $data['error'] = "Username atau password salah!";
        return view('user/login', $data);
    }


    public function register(){
        session();
        $data=[
            'validation'=>\Config\Services::validation()
            ];
        return view('user/register',$data);
    }

    public function save(){
        $data = $this->penggunaModel->getPengguna();
        $password = $this->request->getVar('password');
        $password2 = $this->request->getVar('password2');
        
        if ($password != $password2) {
            echo '<script>alert("Konfirmasi Password tidak sesuai");</script>';
            echo '<script>window.location.href = "/user/register";</script>';
            exit(); }
    
        $username = $this->request->getVar('username');
    
        foreach ($data as $d) {
            if ($d['username'] == $username) {
                echo '<script>alert("Username sudah digunakan!");</script>';
                echo '<script>window.location.href = "/user/register";</script>';
                exit();
            }
        }
    
        $this->penggunaModel->save([
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'umur' => $this->request->getVar('umur'),
            'username' => $username,
            'password' => $password,
            'email_pengguna' => $this->request->getVar('email_pengguna'),
            'no_telepon' => $this->request->getVar('no_telepon')
        ]);
    
        return redirect()->to('/login');
    }
    
    public function prebooking($id_film)
    {
        $data = [
            'film'=> $this->filmModel->getFilm($id_film),
            'jadwal'=>$this->jadwalModel->getJadwalByIdFilm($id_film)
        ];
        return view('user/prebooking',$data);
    }
    public function profil($id_pengguna)
    {
        $data = [
            'transaksi' => $this->transaksiModel->getTransaksibyUser($id_pengguna),
            'pengguna' => $this->penggunaModel->getPengguna($id_pengguna),
            'jadwal' => $this->jadwalModel->getJadwal(),
            'kursi' => $this->kursiModel->getKursi(),
            'film' => $this->filmModel->getFilm()
        ];
        return view('user/profil', $data);
    }

    public function tiket($id_transaksi)
    {   
        $transaksi=$this->transaksiModel->getTransaksi($id_transaksi);
        $id_pengguna=$transaksi['id_pengguna'];
        $data=[
            'id_transaksi'=>$id_transaksi,
            'transaksi'=>$this->transaksiModel->getTransaksi($id_transaksi),
            'pengguna'=>$this->penggunaModel->getPengguna($id_pengguna),
            'jadwal'=>$this->jadwalModel->getJadwal(),
            'kursi'=>$this->kursiModel->getKursi(),
            'film'=>$this->filmModel->getFilm()
        ];
        return view('user/tiket',$data);
    }

    public function jumlahKursi($id_jadwal)
    {   $jumlahKursi = $this->request->getVar('jumlah_kursi');
        $idjadwal = $this->request->getVar('id_jadwal');
        $jadwal=$this->jadwalModel->getJadwal($id_jadwal);
        $film=$this->filmModel->getFilm($jadwal['id_film']);
        $kursi=$this->kursiModel->getKursi();
        $transaksi=$this->transaksiModel->getTransaksi();
        $data = [
            'jumlah_kursi' => $jumlahKursi,
            'jadwal'=>$jadwal,
            'film'=>$film,
            'kursi'=>$kursi,
            'transaksi'=>$transaksi
        ];
        return view('user/jumlahKursi',$data);
    }


    public function pilihKursi() {
        // Retrieve the values from the request
        $jumlahKursi = $this->request->getVar('jumlah_kursi');
        $idjadwal = $this->request->getVar('id_jadwal');
        $jadwal=$this->jadwalModel->getJadwal($idjadwal);
        $film=$this->filmModel->getFilm($jadwal['id_film']);
        $kursi=$this->kursiModel->getKursi();
        $transaksi=$this->transaksiModel->getTransaksi();
        // Add the values to the $data array
        $data = [
            'jumlah_kursi' => $jumlahKursi,
            'jadwal'=>$jadwal,
            'film'=>$film,
            'kursi'=>$kursi,
            'transaksi'=>$transaksi
        ];
    
        // Return the view with the data
        return view('user/pilihKursi', $data);
    }
    
    public function pesan(){
        $idjadwal = $this->request->getVar('id_jadwal');
        $jadwal=$this->jadwalModel->getJadwal($idjadwal);
        $film=$this->filmModel->getFilm($jadwal['id_film']);
        $kursi=$this->request->getVar('selected_seat');
        $idpengguna=$this->request->getVar('id_pengguna');
        $this->transaksiModel->save([
            'id_pengguna'=> $idpengguna,
            'id_studio' => $jadwal['id_studio'],
            'id_kursi' => $kursi,
            'id_film' => $jadwal['id_film'],
            'id_jadwal'=>$idjadwal
        ]);
        echo '<script>';
        echo 'if (confirm("Film berhasil dipesan ! Silahkan lihat tiket di profil")) {';
        echo '   window.location.href = "/";'; 
        echo '}';
        echo '</script>';
        
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    public function editProfile()
    {
        $id_pengguna = session()->get('id_pengguna');
        $data = [
            'pengguna' => $this->penggunaModel->getPengguna($id_pengguna),
        ];
        return view('user/editProfile', $data);
    }

    public function updateProfile()
    {

        $id_pengguna = session()->get('id_pengguna');
        $fileGambar = $this->request->getFile('gambar_profil');
        
        if ($fileGambar->isValid()) {
            // Jika ya, pindahkan file gambar baru ke folder 'image'
            $fileGambar->move('image');
            $namaGambar = $fileGambar->getName();
        } else {
            // Jika tidak, gunakan nama file gambar sebelumnya
            $namaGambar = $this->request->getPost('gambar_sebelumnya');
        }
        $this->penggunaModel->update($id_pengguna, [
            'nama_pengguna' => $this->request->getVar('nama_pengguna'),
            'umur_pengguna' => $this->request->getVar('umur_pengguna'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'email_pengguna' => $this->request->getVar('email_pengguna'),
            'gambar_profil'=> $namaGambar
            
        ]);
        

        $transaksi = $this->transaksiModel->getTransaksibyUser($id_pengguna);
        $updatedPengguna = $this->penggunaModel->getPengguna($id_pengguna);


        // Kirim data terupdate ke view
        return view('user/profil', [
            'pengguna' => $updatedPengguna,
            'transaksi' => $transaksi,
            'film' => $this->filmModel->getFilm(),
            'jadwal' => $this->jadwalModel->getJadwal(),
            'kursi' => $this->kursiModel->getKursi(),
        ]);
        

    }
    public function search(){
        $keyword = $this->request->getVar('keyword');
        
        // $filmModel = new FilmModel(); // Instansiasi model jika belum dilakukan
        
        // if ($keyword) {
        //     $film = $filmModel->search($keyword); // Panggil metode search pada model
        // } else {
        //     $film = $filmModel->findAll(); // Panggil metode findAll jika tidak ada keyword
        // }

        $keyword = $this->request->getVar('keyword');
        $film=$this->filmModel;
        if ($keyword) {
            $film = $this->filmModel->search($keyword);
        }
        else{
            $film = $this->filmModel;
        }
        $film=$this->filmModel->getFilm();
       
        $data = [
            'film' => $film
        ];
        return view('user/search', $data);
    }
    public function deleteTransaction($id_transaksi)
    {
        $this->transaksiModel->delete($id_transaksi);
        return redirect()->to('/profil/' . session()->get('id_pengguna')); // Redirect back to the user's profile page
    }
}
