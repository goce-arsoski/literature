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
        $settings->admin_main = '#3b82f6';
        $settings->admin_hover = '#60a5fa';
        $settings->admin_sidebar_toggler_bg = '#dbeafe';
        $settings->admin_sidebar_toggler_arrow = '#3b82f6';
        
        $settings->touch();
        $settings->save();
    }
}
