<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enums\PermissionType;



class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        

        // create permissions for Consomation 
        Permission::create(['name' => PermissionType::CREATECONSOMATION]);
        Permission::create(['name' => PermissionType::VIEWCONSOMATION]);
        Permission::create(['name' => PermissionType::EDITCONSOMATION]);
        Permission::create(['name' => PermissionType::DELETECONSOMATION]);
        Permission::create(['name' => PermissionType::GESTIONCONSOMATION]);

        // create permissions for order 
        Permission::create(['name' => PermissionType::CREATEORDER]);
        Permission::create(['name' => PermissionType::VIEWORDER]);
        Permission::create(['name' => PermissionType::DELETEORDER]);
        Permission::create(['name' => PermissionType::EDITORDER]);
        Permission::create(['name' => PermissionType::GESTIONORDER]);

        // create permissions for FeedBack  
        Permission::create(['name' => PermissionType::CREATEFEEDBACK]);
        Permission::create(['name' => PermissionType::VIEWFEEDBACK]);
        Permission::create(['name' => PermissionType::DELETEFEEDBACK]);
        Permission::create(['name' => PermissionType::EDITFEEDBACK]);
        Permission::create(['name' => PermissionType::GESTIONFEEDBACK]);

        // create permissions for camoin 
        Permission::create(['name' =>  PermissionType::CREATECAMION]);
        Permission::create(['name' =>  PermissionType::VIEWCAMION]);
        Permission::create(['name' =>  PermissionType::DELETECAMION]);
        Permission::create(['name' =>  PermissionType::EDITCAMION]);
        Permission::create(['name' =>  PermissionType::GESTIONCAMION]);

         // create permissions for Profile 
        Permission::create(['name' => PermissionType::CREATEPROFIL]);
        Permission::create(['name' => PermissionType::EDITPROFIL]);
        Permission::create(['name' => PermissionType::DELETEPROFIL]);
        Permission::create(['name' => PermissionType::VIEWPROFIL]);
        Permission::create(['name' => PermissionType::GESTIONPROFIL]);

        // create roles and assign created permissions

        $role = Role::create(['name' => UserType::CLIENT]);
        $role->givePermissionTo([
            PermissionType::CREATEPROFIL,
            PermissionType::EDITPROFIL,
            PermissionType::DELETEPROFIL,
            PermissionType::VIEWPROFIL,
            PermissionType::CREATEORDER,
            PermissionType::VIEWORDER,
            PermissionType::DELETEORDER,
            PermissionType::EDITORDER,
            PermissionType::CREATEFEEDBACK,
            PermissionType::VIEWFEEDBACK,
            PermissionType::DELETEFEEDBACK,
            PermissionType::EDITFEEDBACK
        ]);

        // or may be done by chaining
        $role = Role::create(['name' => UserType::DRIVER])
            ->givePermissionTo([
                PermissionType::CREATEPROFIL,
                PermissionType::EDITPROFIL,
                PermissionType::DELETEPROFIL,
                PermissionType::VIEWPROFIL,
                PermissionType::VIEWORDER,
                PermissionType::CREATEFEEDBACK,
                PermissionType::VIEWFEEDBACK,
                PermissionType::DELETEFEEDBACK,
                PermissionType::EDITFEEDBACK
                ]);

        $role = Role::create(['name' => UserType::ADMIN]);
        $role->givePermissionTo(Permission::all());
    }
}
