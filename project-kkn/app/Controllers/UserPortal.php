<?php

namespace App\Controllers;

class UserPortal extends BaseController
{
    public function index()
    {
        echo view('viewUserPortal');
    }
}
