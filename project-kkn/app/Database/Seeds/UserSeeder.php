<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_user' => 'Administrator',
                'username' => 'admin',
                'password' => password_hash('hanura123', PASSWORD_BCRYPT)
            ],
            [
                'nama_user' => 'Tim IT',
                'username' => 'TimITHanura',
                'password' => password_hash('hanurajaya!', PASSWORD_BCRYPT)
            ]
        ];
        $this->db->table('tb_users')->insertBatch($data);
    }
}
