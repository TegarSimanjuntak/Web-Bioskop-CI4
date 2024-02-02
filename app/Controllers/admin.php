<?php

namespace App\Controllers;

use App\Models\FilmModel;
use App\Models\PenggunaModel;
use App\Models\StudioModel;
use App\Models\TransaksiModel;
use App\Models\JadwalModel;
use App\Models\kursiModel;

class Admin extends BaseController
{
    protected $filmModel;
    protected $penggunaModel;
    protected $studioModel;
    protected $transaksiModel;
    protected $jadwalModel;
    protected $kursiModel;

    public function __construct()
    {
        $this->filmModel = new FilmModel();
        $this->penggunaModel = new PenggunaModel();
        $this->studioModel = new StudioModel();
        $this->transaksiModel = new TransaksiModel();
        $this->jadwalModel = new JadwalModel();
        $this->kursiModel = new KursiModel();
    }

    public function index()
    {
        $data = [
            'title'=>'Daftar Film',
            'films' => $this->filmModel->findAll(),
            'users' => $this->penggunaModel->findAll(),
        ];

        return view('admin/dataFilm', $data);
    }
    public function logout()
    {
        // Hapus sesi dan arahkan kembali ke halaman login
        session()->destroy();
        return redirect()->to('/login');
    }
    public function create(){
        $data = [
            'title'=>'Tambah Film',
        ];
        return view('admin/create',$data);
    }

    public function saveFilm(){
       $fileGambar=$this->request->getFile('gambar');
       //pindah file ke folder img
       $fileGambar->move('image');
       $namaGambar = $fileGambar->getName();
    
        $this->filmModel->save([
            'nama_film'=>$this->request->getVar('nama_film'),
            'gambar'=>$namaGambar,
            'tahun_rilis'=>$this->request->getVar('tahun_rilis'),
            'deskripsi_film'=>$this->request->getVar('deskripsi_film'),
            'trailer_film'=>$this->request->getVar('trailer_film'),
            'status'=>1
        ]);
        session()->setFlashdata('pesan','data berhasil ditambahkan');
        return redirect()->to('/admin/dataFilm');

    }

    public function edit($id_film){
        $data=[
            'title'=>'Edit Film',
            'film'=> $this->filmModel->getFilm($id_film)
            ];
        return view('/admin/edit',$data);
    }

    public function updateFilm($id_film)
{
     $fileGambar = $this->request->getFile('gambar');

    // Periksa apakah ada file gambar yang diunggah
    if ($fileGambar->isValid()) {
        // Jika ya, pindahkan file gambar baru ke folder 'image'
        $fileGambar->move('image');
        $namaGambar = $fileGambar->getName();
    } else {
        // Jika tidak, gunakan nama file gambar sebelumnya
        $namaGambar = $this->request->getPost('gambar_sebelumnya');
    }
    $this->filmModel->update($id_film, [
        'nama_film' => $this->request->getVar('nama_film'),
        'gambar' => $namaGambar,
        'tahun_rilis' => $this->request->getVar('tahun_rilis'),
        'deskripsi_film' => $this->request->getVar('deskripsi_film'),
        'trailer_film' => $this->request->getVar('trailer_film'),
        'status' => $this->request->getVar('status')
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/admin/dataFilm');
}
    public function studio(){
        $data=[
            'title'=>'Daftar Studio',
            'studio'=>$this->studioModel->getStudio()
        ];
        return view('/admin/dataStudio',$data);
    }
    public function dataUser(){
        $data=[
            'title'=>'Data Pengguna',
            'pengguna'=>$this->penggunaModel->getPenggunaTanpaAdmin()
        ];
        return view('/admin/dataUser',$data);
    }

    public function riwayatTransaksi($id_pengguna){
        $data = [
            'title'=>'Data Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksibyUser($id_pengguna),
            'pengguna' => $this->penggunaModel->getPengguna($id_pengguna),
            'jadwal' => $this->jadwalModel->getJadwal(),
            'kursi' => $this->kursiModel->getKursi(),
            'film' => $this->filmModel->getFilm()
        ];
        return view('/admin/dataTransaksi',$data);
    }


    public function dataJadwal(){
        $data = [
            'title'=>'Jadwal Film',
            'transaksi' => $this->transaksiModel->getTransaksi(),
            'jadwal' => $this->jadwalModel->getJadwal(),
            'kursi' => $this->kursiModel->getKursi(),
            'film' => $this->filmModel->getFilm()
        ];

        return view('/admin/dataJadwal',$data);
    }
    public function editJadwal($id_jadwal){
        $data=[
            'title'=>'Edit Jadwal',
            'jadwal'=> $this->jadwalModel->getJadwal($id_jadwal)
            ];
        return view('/admin/editJadwal',$data);
    }

    public function updateJadwal($id_jadwal)
{
    $this->jadwalModel->update($id_jadwal, [
        'jam_tayang' => $this->request->getVar('jam_tayang'),
        'jam_selesai' => $this->request->getVar('jam_selesai'),
        'status' => $this->request->getVar('status')
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/admin/dataJadwal');
}
public function dataKursi($id_jadwal){
    $jadwal=$this->jadwalModel->getJadwal($id_jadwal);
    $film=$this->filmModel->getFilm($jadwal['id_film']);
    $kursi=$this->kursiModel->getKursi();
    $transaksi=$this->transaksiModel->getTransaksi();
    $data=[
        'title'=>'Data Kursi',
        'jadwal'=> $this->jadwalModel->getJadwal($id_jadwal),
        'film'=>$film,
        'kursi'=>$kursi,
        'transaksi'=>$transaksi
        
        ];
    return view('/admin/dataKursi',$data);
}

public function tambahJadwal(){
    $data=[
        'title'=>'Tambah Jadwal',
        'film'=>$this->filmModel->getFilmAktif(),
        'studio'=>$this->studioModel->getStudio()
    ];
    return view('/admin/tambahJadwal',$data);
}

public function saveJadwal(){
       
    $this->jadwalModel->save([
        'id_film'=>$this->request->getVar('id_film'),
        'tanggal_tayang'=>$this->request->getVar('tanggal_tayang'),
        'jam_tayang'=>$this->request->getVar('jam_tayang'),
        'jam_selesai'=>$this->request->getVar('jam_selesai'),
        'id_studio'=>$this->request->getVar('id_studio'),
        'status'=>$this->request->getVar('status'),
    ]);
    session()->setFlashdata('pesan','data berhasil ditambahkan');
    return redirect()->to('/admin/dataJadwal');

}
}
