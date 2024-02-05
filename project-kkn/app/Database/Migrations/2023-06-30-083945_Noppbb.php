<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Faker\DefaultGenerator;

class Noppbb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nop' => [
                'type'       => 'varchar',
                'constraint' => '100',
            ],
            'tahun' => [
                'type' => 'YEAR',
                'null' => true,
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '100',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                
            ],
            'besaran_pbb' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'null' => true,
            ],
            'denda' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'default' => date('Y-m-d'),
                // 'null' => true,
            ],
            'status_bayar' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'jenis_pajak' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_noppbb');
    }

    public function down()
    {
        $this->forge->dropTable('tb_noppbb');
    }
}
