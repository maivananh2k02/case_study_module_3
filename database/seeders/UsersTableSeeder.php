<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles=Role::where('name','admin')->first();
        $authorRoles=Role::where('name','author')->first();

        $admin=Admin::create(['name'=>'vanhuyen','email'=>'vanhuyen2k02@gmail.com','password'=>md5('1234567')]);
        $author=Admin::create(['name'=>'vanh','email'=>'vanh2k02@gmail.com','password'=>md5('1234567')]);
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);

    }
}
