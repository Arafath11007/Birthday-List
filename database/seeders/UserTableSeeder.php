<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
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
                'name'  =>  'Person 1',
                'dob'   =>  '1990-01-02'
            ],
            [
                'name'  =>  'Person 2',
                'dob'   =>  '1985-11-11'
            ],
            [
                'name'  =>  'Person 2',
                'dob'   =>  '1985-11-11'
            ],
            [
                'name'  =>  'Person 3',
                'dob'   =>  '1990-11-12'
            ],
            [
                'name'  =>  'Person 5',
                'dob'   =>  '2000-04-09'
            ],
            [
                'name'  =>  'Person 6',
                'dob'   =>  '1999-12-31'
            ],
            [
                'name'  =>  'Person 7',
                'dob'   =>  '2023-02-08'
            ],
            [
                'name'  =>  'Person 8',
                'dob'   =>  '2023-04-15'
            ],
            [
                'name'  =>  'Person 9',
                'dob'   =>  '2023-02-12'
            ],
            [
                'name'  =>  'Person 10',
                'dob'   =>  '2023-03-25'
            ],
            [
                'name'  =>  'Person 11',
                'dob'   =>  '2023-02-10'
            ],
            [
                'name'  =>  'Person 12',
                'dob'   =>  '2024-02-01'
            ],
            [
                'name'  =>  'Person 13',
                'dob'   =>  '2023-02-09'
            ],

        ]);
    }
}
