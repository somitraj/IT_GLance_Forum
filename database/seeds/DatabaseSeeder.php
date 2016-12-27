<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_tbl')->insert([
            'username' => 'somit',
            'password' => bcrypt('1234'),
            'email' => 'ranjitkarsomit@gmail.com',
            'user_type_id'=>'1',
            'status_id'=>'1',
            'created_at' => '2016/12/27',
            'updated_at'=> '2016/12/27',
        ]);
    }
}
