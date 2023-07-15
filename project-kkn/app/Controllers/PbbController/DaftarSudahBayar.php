<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class DaftarSudahBayar extends BaseController
{
    public function index()
    {
        return view('pbbView/daftarSudahBayar/viewDaftarSudahBayar');
    }
}
