<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $wards = [
            [
                // id: 7
                "name" => "Province 1 - 1 - 1",
                "type" => "GrandChild",
                "province_at" => 3,
            ],
            [
                // id: 8
                "name" => "Province 1 - 1 - 2",
                "type" => "GrandChild",
                "province_at" => 3,
            ],
            [
                // id: 9
                "name" => "Province 1 - 2 - 1",
                "type" => "GrandChild",
                "province_at" => 4,
            ],
            [
                // id: 10
                "name" => "Province 1 - 2 - 2",
                "type" => "GrandChild",
                "province_at" => 4,
            ],
            [
                // id: 11
                "name" => "Province 2 - 1 - 1",
                "type" => "GrandChild",
                "province_at" => 5,
            ],
            [
                // id: 12
                "name" => "Province 2 - 1 - 2",
                "type" => "GrandChild",
                "province_at" => 5,
            ],
            [
                // id: 13
                "name" => "Province 2 - 2 - 1",
                "type" => "GrandChild",
                "province_at" => 6,
            ],
            [
                // id: 14
                "name" => "Province 2 - 2 - 2",
                "type" => "GrandChild",
                "province_at" => 6,
            ]
        ];
        foreach( $wards as $key => $value ) {
            \App\Models\Province::create($value);
        }
    }
}