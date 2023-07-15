<?php

namespace App\Controllers\PbbController;
use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\NOPModel;

class DaftarNopPbb extends BaseController
{
    function __construct()
    {
        $this->nopModel = new NOPModel();
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->findAll();
        // $builder = $this->db->table('tb_noppbb');
        // $query   = $builder->get()->getResult();

        // $query = $this->db->query("SELECT *FROM tb_noppbb");

        // $data['tb_noppbb'] = $query->getResult();

        return view('pbbView/daftarNopPbb/viewDaftarNopPbb', $data);
    }

    public function create()
    {
        return view('daftarNopPbb/addNopPbb');

        $data = $this->request->getPost();
        $this->nopModel->insert($data);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data berhasil Disimpan');
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
        $noppbb = $this->nopModel->where('id', $id)->first();
        if (is_object($noppbb)) {
            $data['noppbb'] = $noppbb;
            return view('daftarnoppbb/editNopPbb', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // if ($id != null) {
        //     $query = $this->db->table('tb_noppbb')->getWhere(['id' => $id]);
        //     if ($query->resultID->num_rows > 0) {
        //         $data['nopPbb'] = $query->getRow(); //getRow return object teratas
        //         return view('daftarnoppbb/editNopPbb', $data);
        //     } else {
        //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        //     }
        // } else {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->nopModel->update($id, $data);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Diperbaharui");
        // $data = $this->request->getPost();
        // unset($data['_method']);

        // $this->db->table('tb_noppbb')->where(['id' => $id])->update($data);
        // return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Diperbaharui");
    }

    public function delete($id = null)
    {
        // $this->nopModel->where('id', $id)->delete(); 
        $this->nopModel->delete($id);
        return redirect()->to(site_url('daftarNopPbb'))->with('success', 'Data Berhasil Dihapus');
    }

    // public function destroy($id)
    // {
    //     $this->db->table('tb_noppbb')->where(['id' => $id])->delete();
    // return redirect()->to(site_url('daftarNopPbb'))->with('success', "Data Berhasil Dihapus");
    // }

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
