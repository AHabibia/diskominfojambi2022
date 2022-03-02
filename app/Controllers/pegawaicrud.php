<?php

namespace App\Controllers;

class pegawaicrud extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\ModelPeg();
    }
    public function cek()
    {
        $NIP = $this->request->getPost('vNIP');
        $link = file_get_contents("http://localhost/xampp/apip.html");
        $api = json_decode($link, TRUE);
        if ($NIP > 0) {
            $hasil['NIP'] = $api[0]['nip'];
            $hasil['Nama'] = $api[0]['nama'];
            $hasil['JK'] = $api[0]['jenkel'];
            $hasil['TL'] = $api[0]['tgl_lahir'];
            $hasil['Gol'] = $api[0]['golongan'];
            $hasil['Jab'] = $api[0]['jabatan'];
            $hasil['UK'] = $api[0]['unit_kerja'];
            $hasil['Kes'] = $api[0]['kesempatan'];
            $hasil['SP'] = $api[0]['status_pegawai'];
            $hasil['SA'] = $api[0]['status_aktif'];
            /*$hasil['sukses'] = "Data Berhasil Ditemukan";
            $NIP = $api['nip'];
            $Nama = $api['nama'];
            $JK = $api['jenkel'];
            $TL = $api['tgl_lahir'];
            $Gol = $api['golongan'];
            $Jab = $api['jabatan'];
            $UK = $api['unit_kerja'];
            $Kes = $api['kesempatan'];
            $SP = $api['status_pegawai'];
            $SA = $api['status_aktif'];
            $aNIP = $NIP;
            $aNama = $Nama;*/
        } else {
        }
        return json_encode($hasil);
    }

    public function tambah()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'NIP' => [
                'label' => 'NIP',
                'rules' => 'required|min_length[7]',
                'errors' => [
                    'required' => 'NIP Harus Diisi',
                    'min_length' => 'Minimum NIP adalah 7 angka'
                ]
            ],
            'Nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama Harus Diisi',
                    'min_length' => 'Minimum Nama adalah 3 huruf'
                ]
            ],
            'JK' => [
                'label' => 'JK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Harus Diisi',
                ]
            ]
        ];
        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $NIP = $this->request->getPost('NIP');
            $Nama = $this->request->getPost('Nama');
            $JK = $this->request->getPost('JK');
            $TL = $this->request->getPost('TL');
            $Gol = $this->request->getPost('Gol');
            $Jab = $this->request->getPost('Jab');
            $Kes = $this->request->getPost('Kes');
            $UK = $this->request->getPost('UK');
            $SP = $this->request->getPost('SP');
            $SA  = $this->request->getPost('SA');

            $databaru = [
                'nip' => $NIP,
                'nama' => $Nama,
                'jenkel' => $JK,
                'tgl_lahir' => $TL,
                'golongan' => $Gol,
                'jabatan' => $Jab,
                'unit_kerja' => $UK,
                'kesempatan' => $Kes,
                'status_pegawai' => $SP,
                'status_aktif' => $SA
            ];

            $this->model->save($databaru);

            $hasil['sukses'] = "Data  berhasil ditambah";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        return json_encode($hasil);
    }
    public function index()
    {
        echo view('head');
        echo view('/CRUDP/pegawai');
        echo view('foot');
    }
}
