<?php

namespace App\Controllers;

class UserPortal extends BaseController
{
    public function index()
    {
        echo view('viewUserPortal');
    }

    public function viewAboutUs()
    {
        echo view('viewAboutUs');
    }

    public function viewCopyright()
    {
        echo view('viewCopyright');
    }

    public function viewContact()
    {
        echo view('viewContact');
    }
}
