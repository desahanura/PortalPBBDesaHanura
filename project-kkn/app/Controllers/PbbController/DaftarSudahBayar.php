<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;
use App\Models\NOPModel;


class DaftarSudahBayar extends BaseController
{
    function __construct()
    {
        $this->nopModel = new NOPModel();
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->withDeleted()->where('status_bayar', '1')->find();
        // dd($data['noppbb']);

        return view('pbbView/daftarSudahBayar/viewDaftarSudahBayar', $data);
    }
}
