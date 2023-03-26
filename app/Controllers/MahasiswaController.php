<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Controllers\BaseController;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa';
        $data['getMahasiswa'] = $model->getMahasiswa();
 
        // return view('mahasiswa/index', $data);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/index', $data);
        echo view('layout/v_footer');
    }

    public function search()
    {
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa By Nama';
        $nama = $this->request->getPost('nama');
        $data['getMahasiswa'] = $model->getMahasiswaByNama($nama);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/index', $data);
        echo view('layout/v_footer');
    }

    public function detail($id){
        $model = new MahasiswaModel;
        $data['title'] = 'Data Detail Mahasiswa';
        $data['getMahasiswa'] = $model->getMahasiswa($id);
        
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/detail', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Mahasiswa';
        return view('mahasiswa/add', $data);
    }

    public function save(){
        $model = new MahasiswaModel;
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        );
        $model->saveMahasiswa($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }

    public function edit($id){
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa - Edit';
        $data['getMahasiswa'] = $model->getMahasiswa($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $model = new MahasiswaModel;

        $data = array(
            'id' => $this->request->getPost('id'),
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        );
        $model->updateMahasiswa($data);

        echo '<script>
                alert("Selamat! Berhasil Mengubah Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }


    public function delete($id){
        $model = new MahasiswaModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }
}
