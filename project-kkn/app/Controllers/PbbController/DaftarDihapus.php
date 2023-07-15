<?php


namespace App\Controllers\PbbController;

use App\Models\NOPModel;
use App\Controllers\BaseController;

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
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Data Berhasil Direstore');
            }
        } else {
            $this->db->table(tb_noppbb)
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', NULL, FALSE)
                ->update();
            if ($this->db->affectedRows() > 0) {
                return redirect()->to(site_url('daftarDihapus/'))->with('success', 'Data Berhasil Direstore');
            }
        }
    }

    public function delete2($id = null)
    {
        if ($id != null) {
            $this->nopModel->delete($id);
            return redirect()->to(site_url('daftarDihapus'))->with('success', 'Data Berhasil Dihapus');
        } else {
            $this->nopModel->purgeDeleted();
            return redirect()->to(site_url('daftarDihapus'))->with('success', 'Data Berhasil Dihapus Permanen');
        }
    }
}
