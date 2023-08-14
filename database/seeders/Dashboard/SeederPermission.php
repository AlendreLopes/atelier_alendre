<?php

namespace Database\Seeders\Dashboard;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Reset cached roles and permissions
        // create permissions to system reports
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'view']);
        // 
        Permission::create(['name' => 'comment']);
        Permission::create(['name' => 'comment_edit']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);
        // 
        Permission::create(['name' => 'image']);
        Permission::create(['name' => 'download']);
        Permission::create(['name' => 'password']);
        Permission::create(['name' => 'print']);
        // 
        Permission::create(['name' => 'whatsapp_audio']);
        Permission::create(['name' => 'whatsapp_delete']);
        Permission::create(['name' => 'whatsapp_download']);
        Permission::create(['name' => 'whatsapp_image']);
        Permission::create(['name' => 'whatsapp_receive']);
        Permission::create(['name' => 'whatsapp_remove']);
        Permission::create(['name' => 'whatsapp_send']);
        Permission::create(['name' => 'whatsapp_share']);
        // create roles and assign created permissions
        $roleUser = Role::create(['name' => 'user'])
            ->givePermissionTo(['download', 'comment', 'comment_edit', 'image', 'print', 'password', 'view']);
        // 
        // or may be done by chaining
        $roleWhatsApp = Role::create(['name' => 'whatsapp'])
            ->givePermissionTo(['whatsapp_audio', 'whatsapp_delete', 'whatsapp_download', 'whatsapp_image', 'whatsapp_receive', 'whatsapp_remove', 'whatsapp_send', 'whatsapp_share']);
        // 
        $roleAdmin = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all());
        // 
        $theCreator = Role::create(['name' => 'theCreator'])
            ->givePermissionTo(Permission::all());
        // 
    }
}