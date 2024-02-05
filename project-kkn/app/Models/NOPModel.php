<?php

namespace App\Models;

use CodeIgniter\Model;

class NOPModel extends Model
{
    protected $table            = 'tb_noppbb';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nop', 'tahun', 'nama', 'alamat', 'besaran_pbb', 'denda', 'status_bayar', 'jenis_pajak','tanggal'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $useSoftDeletes   = true;

    public function forceDelete($id)
    {
        // Melakukan penghapusan permanen berdasarkan ID
        $this->withDeleted()->where('id', $id)->purgeDeleted();
    }

    public function getPaginated($num, $keyword = null)
    {
        $builder = $this->builder();
        if ($keyword != '') {
            $builder->groupStart()
                ->like('nop', '%' . $keyword . '%')
                ->orLike('tahun', '%' . $keyword . '%')
                ->orLike('nama', '%' . $keyword . '%')
                ->orLike('alamat', '%' . $keyword . '%')
                ->orLike('besaran_pbb', '%' . $keyword . '%')
                ->orLike('denda', '%' . $keyword . '%')
                ->orLike('status_bayar', '%' . $keyword . '%')
                ->orLike('tanggal', '%' . $keyword . '%')
                ->groupEnd();
        }
        return [
            'noppbb' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
