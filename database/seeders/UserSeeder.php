<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchid\Support\Facades\Dashboard;
use Orchid\Platform\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => '2020-01-01',
            'updated_at' => '2020-01-01',
            'permissions' => '{}',
        ]);

        DB::table('roles')->insert([
            'id' => 1,
            'slug' => 'ADM',
            'name' => 'Administrador',
            'created_at' => '2020-01-01',
            'updated_at' => '2020-01-01',
            'permissions' => Dashboard::getAllowAllPermission(),
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'slug' => 'USU',
            'name' => 'Usuario',
            'created_at' => '2020-01-01',
            'updated_at' => '2020-01-01',
            'permissions' => '{}',
        ]);

        DB::table('role_users')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);

        $role_usu = Role::where('slug', 'USU')->first();

        \App\Models\User::factory(10)->create()->each(function ($user) use ($role_usu) {
            $user->addRole($role_usu);
        });
    }
}
