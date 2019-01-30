<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [[
            'name'=>'Nguyễn Văn A'
        ],[
            'name'=>'Nguyễn Văn B'
        ],[
            'name'=>'Nguyễn Văn C'
        ],[
            'name'=>'Nguyễn Văn D'
        ],[
            'name'=>'Nguyễn Văn E'
        ],[
            'name'=>'Nguyễn Văn F'
        ]];
        DB::table('students')->insert($student);
    }
}
