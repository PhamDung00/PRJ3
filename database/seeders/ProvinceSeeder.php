<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $provinces = [
            [
                // id: 1
                "name" => "Parent Province 1",
                "type" => "Parent",
                "province_at" => null
            ],
            [
                // id: 2
                "name" => "Parent Province 2",
                "type" => "Parent",
                "province_at" => null
            ],
            [
                // id: 3
                "name" => "Child Province 1 - 1",
                "type" => "Child",
                "province_at" => 1
            ],
            [
                // id: 4
                "name" => "Parent Province 1 - 2",
                "type" => "Child",
                "province_at" => null
            ],
            [
                // id: 5
                "name" => "Parent Province 2 - 1",
                "type" => "Child",
                "province_at" => null
            ],
            [
                // id: 6
                "name" => "Parent Province 2 - 2",
                "type" => "Child",
                "province_at" => null
            ],
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}