<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class DaftarSpptTidakDitemukan extends BaseController
{
    public function index()
    {
        return view('pbbView/daftarSpptTidakDitemukan/viewDaftarSpptTidakDitemukan');
    }
}
