<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class DaftarHarusDitagih extends BaseController
{
    public function index()
    {
        return view('pbbView/daftarHarusDitagih/viewDaftarHarusDitagih');
    }
}
