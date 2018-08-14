<?php

use Illuminate\Database\Seeder;
require('UserTableSeeder.php');
require('TheLoaiTableSeeder.php');
require('LoaiTinTableSeeder.php');
require('TinTucTableSeeder.php');
require('CommentTableSeeder.php');

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        //$this->call(TheLoaiTableSeeder::class);
        //$this->call(LoaiTinTableSeeder::class);
        //$this->call(TinTucTableSeeder::class);
        $this->call(CommentTableSeeder::class);
    }
}
