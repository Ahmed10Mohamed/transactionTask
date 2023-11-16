<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'phone' => '01015891836',
                'email' => 'info@test.com',
                'password' => bcrypt('123456'),
                'email_verified_at'=>'2023-06-22 16:37:09',
                'user_type'=>'admin',
                'added_by'=>1,
                'created_at'=>'2023-06-22 16:37:09',
                'updated_at'=>'2023-06-22 16:37:09',

            ] ,
            [
                'name' => 'Ahmed M Bakri',
                'user_name' => 'Beko',
                'phone' => '01149671773',
                'email' => 'ahmed.bakri@yahoo.com',
                'password' => bcrypt('123456'),
                'user_type'=>'customer',
                'email_verified_at'=>'2023-06-22 16:37:09',
                'created_at'=>'2023-06-22 16:37:09',
                'updated_at'=>'2023-06-22 16:37:09',
                'added_by'=>1
            ],
            [
                'name' => 'Tarek Elmoursi',
                'user_name' => 'Tarek',
                'phone' => '01149671779',
                'email' => 'tarek@yahoo.com',
                'password' => bcrypt('123456'),
                'email_verified_at'=>'2023-06-22 16:37:09',
                'user_type'=>'customer',
                'created_at'=>'2023-06-22 16:37:09',
                'updated_at'=>'2023-06-22 16:37:09',
                'added_by'=>1
            ],



            ]);
    }
}
