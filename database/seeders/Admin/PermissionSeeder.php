<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating permission for users
        // Permission::create(['guard_name'=>'admin','name'=>'user-index','group_name'=>'User Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'user-create','group_name'=>'User Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'user-update','group_name'=>'User Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'user-delete','group_name'=>'User Permissions']);

        //permission for role
        // Permission::create(['guard_name'=>'admin','name'=>'role-permission-index','group_name'=>'Roles And Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'role-permission-create','group_name'=>'Roles And Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'role-permission-update','group_name'=>'Roles And Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'role-permission-delete','group_name'=>'Roles And Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'specific-permission-create','group_name'=>'Roles And Permissions']);

        //permission for language
        // Permission::create(['guard_name'=>'admin','name'=>'language-index','group_name'=>'Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'language-create','group_name'=>'Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'language-update','group_name'=>'Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'language-delete','group_name'=>'Language Permissions']);

        //backend language permission
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-generate','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-translate','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-update','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-index','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-api-accesskey','group_name'=>'Backend Language Permissions']);

        //backend settings permission
        // Permission::create(['guard_name'=>'admin','name'=>'maintenance-mode-index','group_name'=>'Settings Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-translate','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-update','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-string-index','group_name'=>'Backend Language Permissions']);
        // Permission::create(['guard_name'=>'admin','name'=>'backend-api-accesskey','group_name'=>'Backend Language Permissions']);

        //permission for Slider
        // Permission::create(['guard_name'=>'admin','name'=>'slider-index','group_name'=>'Homepage Slider']);
        // Permission::create(['guard_name'=>'admin','name'=>'slider-create','group_name'=>'Homepage Slider']);
        // Permission::create(['guard_name'=>'admin','name'=>'slider-update','group_name'=>'Homepage Slider']);
        // Permission::create(['guard_name'=>'admin','name'=>'slider-delete','group_name'=>'Homepage Slider']);

        //permission for About Us
        // Permission::create(['guard_name'=>'admin','name'=>'aboutus-index','group_name'=>'About Us']);
        // Permission::create(['guard_name'=>'admin','name'=>'aboutus-update','group_name'=>'About Us']);

        //permission for Contact Us
        // Permission::create(['guard_name'=>'admin','name'=>'contact-index','group_name'=>'Contact Us']);
        // Permission::create(['guard_name'=>'admin','name'=>'contact-update','group_name'=>'Contact Us']);

         //permission for Service
        // Permission::create(['guard_name'=>'admin','name'=>'service-index','group_name'=>'Service']);
        // Permission::create(['guard_name'=>'admin','name'=>'service-create','group_name'=>'Service']);
        // Permission::create(['guard_name'=>'admin','name'=>'service-update','group_name'=>'Service']);
        // Permission::create(['guard_name'=>'admin','name'=>'service-delete','group_name'=>'Service']);

        //permission for Team
        // Permission::create(['guard_name'=>'admin','name'=>'team-index','group_name'=>'Team']);
        // Permission::create(['guard_name'=>'admin','name'=>'team-create','group_name'=>'Team']);
        // Permission::create(['guard_name'=>'admin','name'=>'team-update','group_name'=>'Team']);
        // Permission::create(['guard_name'=>'admin','name'=>'team-delete','group_name'=>'Team']);

    }
}
