<?php

use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;

class AdminSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' =>'Admin',
            'username'=> 'admin',
            'password'=> bcrypt('admin123'),
            'email' =>'admin1@gmail.com', //str_random(10).'@gmail.com'
            'status'=>1
        ]);

        DB::table('manage_privilege')->insert([
            'admin_id'=>1,
            'privilege_id'=>1,
            'created_at'=> \Illuminate\Support\Carbon::now()->toDateTimeString(),
            'updated_at'=>\Illuminate\Support\Carbon::now()->toDateTimeString()
        ]);
    }
}
