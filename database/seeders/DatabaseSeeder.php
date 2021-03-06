<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateWalletSeeder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            CreateStatusSeeder::class,
            CreateDocumentSeeder::class,
        ]);
    }
}
