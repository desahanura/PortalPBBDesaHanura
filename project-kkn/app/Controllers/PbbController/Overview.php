<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

class Overview extends BaseController
{
    public function index()
    {
        echo view('pbbView/lamanOverview/overview');
    }
}
