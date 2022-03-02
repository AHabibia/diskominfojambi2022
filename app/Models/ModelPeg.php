<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeg extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $allowedFields = ['nip,nama,jenkel,tgl_lahir,golongan,jabatan,
    unit_kerja,kesempatan,status_pegawai,status_aktif'];
}
