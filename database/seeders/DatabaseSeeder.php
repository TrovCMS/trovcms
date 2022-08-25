<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);

        Artisan::call('shield:generate');

        $admin->givePermissionTo(Permission::where('name', 'not like', '%_role')->get());
        $editor->givePermissionTo(Permission::where('name', 'not like', '%_role')->where('name', 'not like', '%_user')->get());
    }
}
