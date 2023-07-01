<?php

namespace App\Controllers;

class DaftarNopPbb extends BaseController
{
    public function index()
    {
        // $builder = $this->db->table('tb_noppbb');
        // $query   = $builder->get()->getResult();

        $query = $this->db->query("SELECT *FROM tb_noppbb");

        $data['tb_noppbb'] = $query->getResult();

        return view('daftarNopPbb/get', $data);
    }
}
