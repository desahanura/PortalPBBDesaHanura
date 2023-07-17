<?php

namespace App\Models;

use CodeIgniter\Model;

class NOPModel extends Model
{
    protected $table            = 'tb_noppbb';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nop', 'tahun', 'nama', 'alamat', 'besaran_pbb', 'denda', 'status_bayar', 'tanggal'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $useSoftDeletes   = true;
}
