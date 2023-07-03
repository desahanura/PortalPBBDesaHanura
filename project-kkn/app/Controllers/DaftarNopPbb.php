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

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
