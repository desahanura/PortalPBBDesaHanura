<?php

namespace App\Controllers\PbbController;

use App\Controllers\BaseController;
use PhpParser\Node\Expr\PostDec;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if (session('id_user')) {
            return redirect()->to(site_url('dashboard'));
        }
        return view('pbbView/auth/viewLogin');
    }

    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('tb_users')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $params = ['id_user' => $user->id_user];
                session()->set($params);
                return redirect()->to(site_url('dashboard'));
            } else {
                return redirect()->back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}
