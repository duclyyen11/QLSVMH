<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subjects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subject = [[
            'name'=>'Toán'
        ],[
            'name'=>'Lý'
        ],[
            'name'=>'Hóa'
        ],[
            'name'=>'Văn'
        ],[
            'name'=>'Sử'
        ],[
            'name'=>'Địa'
        ],[
            'name'=>'Sinh học'
        ],[
            'name'=>'Giáo dục thể chất'
        ],[
            'name'=>'Quốc Phòng'
        ]];
        DB::table('subjects')->insert($subject);
    }
}
