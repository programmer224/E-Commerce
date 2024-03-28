<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([

            //  Admin

            [
             'full_name'=>'Vicky Admin',
             'username'=>'Admin',
             'email'=>'admin@gmail.com',
             'password'=>Hash::make('1111'),
              'role'=>'admin',
              'status'=>'active',
            ],

            //  Vendor

            [
                'full_name'=>'Vicky Vendor',
                'username'=>'Vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('1111'),
                 'role'=>'vendor',
                 'status'=>'active',

            ],

             //  Customer

             [
                'full_name'=>'Vicky Customer',
                'username'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('1111'),
                 'role'=>'customer',
                 'status'=>'active',

            ],

        ]);


    }
}
