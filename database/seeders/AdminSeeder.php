<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@admin.admin';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('admin');
        
        $user->touch();
        $user->save();
        
        $user->assignRole('admin');
    }
}
