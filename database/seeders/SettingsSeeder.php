<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Settings;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = new Settings();
        $settings->blogs_slug = 'blogs';
        $settings->global_author = 'Admin';
        $settings->global_keywords = 'starter, template, laravel 10';
        $settings->global_description = 'Starter template for Laravel 10.';
        
        $settings->touch();
        $settings->save();
    }
}
