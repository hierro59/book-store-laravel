<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_super_admin = Role::create(['name' => 'super-admin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_customer = Role::create(['name' => 'customer']);
        $role_autor = Role::create(['name' => 'autor']);
        $role_curator = Role::create(['name' => 'curator']);
        $role_support = Role::create(['name' => 'support']);
        $role_api = Role::create(['name' => 'api']);

        $permission_read_articles = Permission::create(['name' => 'read-articles']);
        $permission_edit_articles = Permission::create(['name' => 'edit-articles']);
        $permission_write_articles = Permission::create(['name' => 'write-articles']);
        $permission_delete_articles = Permission::create(['name' => 'delete-articles']);

        $permission_read_books = Permission::create(['name' => 'read-books']);
        $permission_edit_books = Permission::create(['name' => 'edit-books']);
        $permission_write_books = Permission::create(['name' => 'write-books']);
        $permission_delete_books = Permission::create(['name' => 'delete-books']);

        $permission_read_roles = Permission::create(['name' => 'read-roles']);
        $permission_edit_roles = Permission::create(['name' => 'edit-roles']);
        $permission_write_roles = Permission::create(['name' => 'write-roles']);
        $permission_delete_roles = Permission::create(['name' => 'delete-roles']);

        $permission_read_users = Permission::create(['name' => 'read-users']);
        $permission_edit_users = Permission::create(['name' => 'edit-users']);
        $permission_write_users = Permission::create(['name' => 'write-users']);
        $permission_delete_users = Permission::create(['name' => 'delete-users']);

        $permission_read_customers = Permission::create(['name' => 'read-customers']);
        $permission_edit_customers = Permission::create(['name' => 'edit-customers']);
        $permission_write_customers = Permission::create(['name' => 'write-customers']);
        $permission_delete_customers = Permission::create(['name' => 'delete-customers']);

        $permission_read_autors = Permission::create(['name' => 'read-autors']);
        $permission_edit_autors = Permission::create(['name' => 'edit-autors']);
        $permission_write_autors = Permission::create(['name' => 'write-autors']);
        $permission_delete_autors = Permission::create(['name' => 'delete-autors']);

        $permission_read_curators = Permission::create(['name' => 'read-curators']);
        $permission_edit_curators = Permission::create(['name' => 'edit-curators']);
        $permission_write_curators = Permission::create(['name' => 'write-curators']);
        $permission_delete_curators = Permission::create(['name' => 'delete-curators']);

        $permission_read_api = Permission::create(['name' => 'read-api']);
        $permission_edit_api = Permission::create(['name' => 'edit-api']);
        $permission_write_api = Permission::create(['name' => 'write-api']);
        $permission_delete_api = Permission::create(['name' => 'delete-api']);

        $permissions_super_admin = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles, 
            $permission_delete_articles,
            $permission_read_books,
            $permission_edit_books,
            $permission_write_books,
            $permission_delete_books,
            $permission_read_roles,
            $permission_edit_roles,
            $permission_write_roles,
            $permission_delete_roles,
            $permission_read_users,
            $permission_edit_users,
            $permission_write_users,
            $permission_delete_users,
            $permission_read_customers,
            $permission_edit_customers,
            $permission_write_customers,
            $permission_delete_customers,
            $permission_read_autors,
            $permission_edit_autors,
            $permission_write_autors,
            $permission_delete_autors,
            $permission_read_curators,
            $permission_edit_curators,
            $permission_write_curators,
            $permission_delete_curators,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api,
            $permission_delete_api
        ];

        $permissions_admin = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles,
            $permission_read_books,
            $permission_edit_books,
            $permission_write_books,
            $permission_read_roles,
            $permission_edit_roles,
            $permission_write_roles,
            $permission_read_users,
            $permission_read_customers,
            $permission_edit_customers,
            $permission_write_customers,
            $permission_read_autors,
            $permission_edit_autors,
            $permission_write_autors,
            $permission_read_curators,
            $permission_edit_curators,
            $permission_write_curators,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api
        ];

        $permissions_customer = [
            $permission_read_articles,
            $permission_read_books,
            $permission_read_customers,
            $permission_read_autors
        ];

        $permissions_autor = [
            $permission_read_articles, 
            $permission_read_books,
            $permission_edit_books,
            $permission_write_books,
            $permission_read_customers,
            $permission_read_autors,
            $permission_read_curators,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api
        ];

        $permissions_curator = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles,
            $permission_read_books,
            $permission_edit_books,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api
        ];

        $permissions_support = [
            $permission_read_articles, 
            $permission_edit_articles,
            $permission_read_books,
            $permission_edit_books,
            $permission_read_customers,
            $permission_edit_customers,
            $permission_read_autors,
            $permission_edit_autors
        ];

        $permissions_api = [
            $permission_read_articles, 
            $permission_edit_articles, 
            $permission_write_articles, 
            $permission_delete_articles,
            $permission_read_books,
            $permission_edit_books,
            $permission_write_books,
            $permission_delete_books,
            $permission_read_roles,
            $permission_edit_roles,
            $permission_write_roles,
            $permission_delete_roles,
            $permission_read_users,
            $permission_edit_users,
            $permission_write_users,
            $permission_delete_users,
            $permission_read_customers,
            $permission_edit_customers,
            $permission_write_customers,
            $permission_delete_customers,
            $permission_read_autors,
            $permission_edit_autors,
            $permission_write_autors,
            $permission_delete_autors,
            $permission_read_curators,
            $permission_edit_curators,
            $permission_write_curators,
            $permission_delete_curators,
            $permission_read_api,
            $permission_edit_api,
            $permission_write_api,
            $permission_delete_api
        ];

        $role_super_admin->syncPermissions($permissions_super_admin);
        $role_admin->givePermissionTo($permissions_admin);
        $role_customer->givePermissionTo($permissions_customer);
        $role_autor->givePermissionTo($permissions_autor);
        $role_curator->givePermissionTo($permissions_curator);
        $role_support->givePermissionTo($permissions_support);
        $role_api->givePermissionTo($permissions_api);
    }
}
