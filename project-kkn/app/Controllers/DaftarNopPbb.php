<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class DaftarNopPbb extends BaseController
{
    public function index()
    {
        // $builder = $this->db->table('tb_noppbb');
        // $query   = $builder->get()->getResult();

        $query = $this->db->query("SELECT *FROM tb_noppbb");

        $data['tb_noppbb'] = $query->getResult();

        return view('daftarNopPbb/viewDaftarNopPbb', $data);
    }

    public function create()
    {
        return view('daftarNopPbb/addNopPbb');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->db->table('tb_noppbb')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('tb_noppbb')->getWhere(['id' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['nopPbb'] = $query->getRow(); //getRow return object teratas
                return view('daftarnoppbb/editNopPbb', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);

        $this->db->table('tb_noppbb')->where(['id' => $id])->update($data);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Diperbaharui");
    }

    public function destroy($id)
    {
        $this->db->table('tb_noppbb')->where(['id' => $id])->delete();
        return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Dihapus");
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
            $spreadsheet = $reader->load($file);
            // $fileUpload = $spreadsheet->getActivateSheet()->toArray();
            // print_r($fileUpload);
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
