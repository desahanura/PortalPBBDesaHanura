<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        echo view('pbbView/lamanDashboard/dashboard');
    }
}
