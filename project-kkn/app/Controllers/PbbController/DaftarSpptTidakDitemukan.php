<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;
use App\Models\NOPModel;

class DaftarSpptTidakDitemukan extends BaseController
{
     public $nopModel;
    function __construct()
    {
        $this->nopModel = new NOPModel();
        
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->withDeleted()->where('jenis_pajak', '0')->find();
        // dd($data['noppbb']);
        return view('pbbView/daftarSpptTidakDitemukan/viewDaftarSpptTidakDitemukan', $data);
    }
}
