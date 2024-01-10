<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory(10)->create();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        // SUPER ADMIN PERMISSIONS
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'update users']);

        // ADMIN PERMISSIONS
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'update courses']);
        Permission::create(['name' => 'delete courses']);
        
        // LECTURER PERMISSIONS
        Permission::create(['name' => 'create questions']);
        Permission::create(['name' => 'delete questions']);
        Permission::create(['name' => 'publish questions']);
        Permission::create(['name' => 'unpublish questions']);
        
        // STUDENTS PERMISSIONS
        Permission::create(['name' => 'answer questions']);
        Permission::create(['name' => 'view results']);

        $superAdminRole = Role::create(['name' => 'super-admin'])
        // $superAdminRole->givePermissionTo(Permission::all());
            ->givePermissionTo(['create users', 'delete users', 'update users', 
                               'create courses', 'update courses', 'delete courses']);

        $adminRole = Role::create(['name' => 'admin'])
            ->givePermissionTo(['publish questions', 'unpublish questions', 'view results']);

        $lecturerRole = Role::create(['name' => 'lecturer'])
            ->givePermissionTo(['publish questions', 'unpublish questions', 'view results']);
            

        $studentRole = Role::create(['name' => 'student'])
            ->givePermissionTo(['answer questions', 'view results']);

        // ASSiGN ROLES TO USERS
        
        $superAdmin = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('password'),
            'role' => 1
        ]);

        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 2
        ]);

        $lecturer = User::create([
            'name' => 'Lecturer',
            'email' => 'lecturer@lecturer.com',
            'password' => bcrypt('password'),
            'role' => 3
        ]);
          
        $student = User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'password' => bcrypt('password'),
            'role' => 0
        ]);   
        
        
    }
}

