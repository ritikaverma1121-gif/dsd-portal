<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AssignAdminRoleSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1); // user ID 1 ko admin banaya jaa raha hai
        if ($user) {
            $user->assignRole('admin'); // 'admin' role assign
        }
    }
}
