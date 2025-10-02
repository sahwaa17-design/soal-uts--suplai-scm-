<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Order extends BaseController
{
    /**
    * @var OrderModel
    */
    
    protected $OrderModel;

    public function __construct()
    {
        $this->OrderModel = new OrderModel();
    }

    public function index()
    {
        $current = $this->request->getVar('page_order')? $this->request->getVar('page_order'):1;
        $cari = $this->request->getVar('cari');

        if ($cari){
            $order = $this->OrderModel->findOrder($cari);
        } else {
            $order = $this->OrderModel;
        }

        $data = [
            'title' => 'Daftar Order',
            'order' => $this->OrderModel->getOrder(),
            'pager' => $this->OrderModel->pager,
            'current' => $current
        ];

        return view('layout/header')
        . view('order/index', $data)
        . view('layout/footer');
    }

    public function detail($idorder)
    {
        $data = [
            'title' => 'Detail Order',
            'order' => $this->OrderModel->getOrder($idorder)
        ];

        return view('layout/header')
        . view('order/detail', $data)
        . view('layout/footer');
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Order',
            'validation' => \Config\Services::validation()
        ];

        return view('layout/header')
        . view('order/tambah', $data)
        . view('layout/footer');
    }

    //simpan
    public function simpan(){
        if (!$this->validate(
            [
                'pelanggan' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ],
                'approved' => [
                    'rules' => 'required',
                    'errors' => ['required' => '{field} harus diisi']
                ]
            ]
        )) {
            return redirect()->to('/order/tambah');
        }

        $this->OrderModel->save(
            [
                'pelanggan' => $this->request->getVar('pelanggan'),
                'date' => $this->request->getVar('date'),
                'approved' => $this->request->getVar('approved'),
                'order_status' => $this->request->getVar('order_status'),
            ]
            );

            session()->setFlashdata('pesan', 'Data Berhasil Ditambah.');
            return redirect()->to('/order');
    }

    public function hapus($idorder){
        $this->OrderModel->delete($idorder);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/order');
    }

    public function ubah($idorder){
        $data = [
            'title' => 'Form Ubah Data Order',
            'validation' => \Config\Services::validation(),
            'order' => $this->OrderModel->getOrder($idorder)
        ];

        return view('layout/header')
        . view('order/ubah', $data)
        . view('layout/footer');   
    }

    public function update($idorder)
    {
        if (!$this->validate([
            'pelanggan' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ],
            'approved' => [
                'rules'  => 'required',
                'errors' => ['required' => '{field} harus diisi']
            ]
        ])) {
        }

        $this->OrderModel->save([
            'id_order'      => $idorder,
            'pelanggan'     => $this->request->getVar('pelanggan'),
            'date'          => $this->request->getVar('date'),
            'approved'     => $this->request->getVar('approved'),
            'order_status' => $this->request->getVar('order_status'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/order');
}
}