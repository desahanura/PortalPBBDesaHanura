<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class Settings extends BaseController
{
    public function index()
    {
        return view('pbbView/settings/viewSettings');
    }
}
