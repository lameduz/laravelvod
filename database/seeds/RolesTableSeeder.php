<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


// composer require laracasts/testdummy
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'owner']);
    }
}
