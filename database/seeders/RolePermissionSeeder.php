<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run()
    {
        // Create permissions
        $permissions = ['create jobs', 'edit jobs', 'delete jobs', 'view applications'];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $recruiter = Role::firstOrCreate(['name' => 'recruiter']);

        // Assign permissions to roles
        $admin->givePermissionTo(Permission::all());
        $recruiter->givePermissionTo(['create jobs', 'view applications']);
    }
}
