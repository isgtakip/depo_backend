<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'malzeme-list',
            'malzeme-create',
            'malzeme-edit',
            'malzeme-delete',
            'firma-list',
            'firma-delete',
            'firma-edit',
            'firma-create',
            'user-list',
            'user-delete',
            'user-add',
            'user-create',
            'depo-sorumlu-list',
            'depo-sorumlu-create',
            'dep-sorumlu-delete',
            'depo-sorumlu-edit',
            'depo-malzeme-list',
            'depo-malzeme-edit',
            'depo-malzeme-create',
            'depo-malzeme-delete',
            'stok-hareket-create',
            'stok-hareket-delete',
            'stok-hareket-edit',
            'stok-hareket-list',
            'stok-hareket-giris',
            'stok-hareket-cikis'
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
