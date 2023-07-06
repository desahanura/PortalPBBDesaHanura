<?php

namespace App\Controllers;

class Overview extends BaseController
{
    public function index()
    {
        echo view('lamanOverview/overview');
    }
}
