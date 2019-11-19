<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'bidang_create',
            ],
            [
                'id'    => '18',
                'title' => 'bidang_edit',
            ],
            [
                'id'    => '19',
                'title' => 'bidang_show',
            ],
            [
                'id'    => '20',
                'title' => 'bidang_delete',
            ],
            [
                'id'    => '21',
                'title' => 'bidang_access',
            ],
            [
                'id'    => '22',
                'title' => 'seksi_create',
            ],
            [
                'id'    => '23',
                'title' => 'seksi_edit',
            ],
            [
                'id'    => '24',
                'title' => 'seksi_show',
            ],
            [
                'id'    => '25',
                'title' => 'seksi_delete',
            ],
            [
                'id'    => '26',
                'title' => 'seksi_access',
            ],
            [
                'id'    => '27',
                'title' => 'lokasi_create',
            ],
            [
                'id'    => '28',
                'title' => 'lokasi_edit',
            ],
            [
                'id'    => '29',
                'title' => 'lokasi_show',
            ],
            [
                'id'    => '30',
                'title' => 'lokasi_delete',
            ],
            [
                'id'    => '31',
                'title' => 'lokasi_access',
            ],
            [
                'id'    => '32',
                'title' => 'jadwal_create',
            ],
            [
                'id'    => '33',
                'title' => 'jadwal_edit',
            ],
            [
                'id'    => '34',
                'title' => 'jadwal_show',
            ],
            [
                'id'    => '35',
                'title' => 'jadwal_delete',
            ],
            [
                'id'    => '36',
                'title' => 'jadwal_access',
            ],
            [
                'id'    => '37',
                'title' => 'setting_access',
            ],
            [
                'id'    => '38',
                'title' => 'petuga_create',
            ],
            [
                'id'    => '39',
                'title' => 'petuga_edit',
            ],
            [
                'id'    => '40',
                'title' => 'petuga_show',
            ],
            [
                'id'    => '41',
                'title' => 'petuga_delete',
            ],
            [
                'id'    => '42',
                'title' => 'petuga_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
