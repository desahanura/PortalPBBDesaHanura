<?php

namespace App\Controllers\PbbController;

use App\Controllers\BaseController;

use App\Models\NOPModel;

class DaftarDihapus extends BaseController
{
    function __construct()
    {
        $this->nopModel = new NOPModel();
    }

    public function index()
    {
        $data['noppbb'] = $this->nopModel->onlyDeleted()->findAll();
        return view('pbbView/daftarDihapus/viewDaftarDihapus', $data);
    }

    public function restore($id = null)
    {
        $this->db = \Config\Database::connect();
        if ($id != null) {
            $this->db->table('tb_noppbb')
                ->set('deleted_at', null, true)
                ->where(['id' => $id])
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('daftarDihapus'))->with('success', 'Data Berhasil Direstore');
            }
        } else {
            $this->db->table('tb_noppbb')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('daftarDihapus'))->with('success', 'Semua Data Berhasil Direstore');
            }
        }
    }

    public function delete2($id = null)
    {
        $this->nopModel = new NOPModel();
        if ($this->request->getMethod() === 'delete') {
            if ($id != null) {
                $this->nopModel->forceDelete($id, true); // Menghapus data secara permanen
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Data Berhasil Dihapus Permanen');
            } else {
                $this->nopModel->purgeDeleted(); // Menghapus semua data yang telah dihapus secara permanen
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Semua Data Berhasil Dihapus Permanen');
            }
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }
}
