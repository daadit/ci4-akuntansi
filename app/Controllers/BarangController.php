<?php

namespace App\Controllers;

use App\Models\Barang;
use App\Models\Supplier;

class BarangController extends BaseController
{
    public function index()
    {
        $model = new Barang();
        $data['barang'] = $model->getBarang()->getResultArray();
        echo view('view_barang', $data);
    }

    public function tambah()
    {
        $model1 = new Supplier();
        $data = [
            'validation' => \Config\Services::validation(),
            'supplier' => $model1->getSupplier()->getResultArray(),
        ];
        echo view('view_tambah_barang', $data);
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi',
                    'max_length' => 'Kolom nomor telepon tidak boleh lebih dari 20 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Barang();
            $data = array(
                'supplierNama' => $this->request->getPost('nama'),
                'supplierAlamat' => $this->request->getPost('alamat'),
                'supplierTelp' => $this->request->getPost('notelp'),
                'supplierUpdatedAt' => date('Y-m-d H:i:s'),
                'supplierCreatedAt' => date('Y-m-d H:i:s')
            );
            $model->saveSupplier($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/supplier');
        } else {
            session()->setFlashdata('failed', 'Gagal menyimpan, ada kesalahan pada inputan anda' . $this->validator->listErrors());
            return redirect()->to('/supplier');
        }
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi',
                    'max_length' => 'Kolom nomor telepon tidak boleh lebih dari 20 karakter'
                ]
            ]
        ];

        $id = $this->request->getPost('id');

        if ($this->validate($rules)) {
            $model = new Barang();
            $data = array(
                'supplierNama' => $this->request->getPost('nama'),
                'supplierAlamat' => $this->request->getPost('alamat'),
                'supplierTelp' => $this->request->getPost('notelp'),
                'supplierUpdatedAt' => date('Y-m-d H:i:s'),
            );
            $model->updateSupplier($data, $id);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/supplier');
        } else {
            session()->setFlashdata('failed', 'Gagal mengedit, ada kesalahan pada inputan anda' . $this->validator->listErrors());
            return redirect()->to('/supplier');
        }
    }

    public function delete()
    {
        $model = new Barang();
        $id = $this->request->getPost('id');
        $model->deleteSupplier($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/supplier');
    }

    public function laporan()
    {
        $model = new Barang();
        $data['supplier'] = $model->getSupplier()->getResultArray();
        echo view('laporan/laporan_supplier', $data);
    }
}
