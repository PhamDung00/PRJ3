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
            ["id" => 1, "name" => "Hà Nội", "type" => "Parent", "province_at" => null],
            ["id" => 2, "name" => "Hà Giang", "type" => "Parent", "province_at" => null],
            ["id" => 4, "name" => "Cao Bằng", "type" => "Parent", "province_at" => null],
            ["id" => 6, "name" => "Bắc Kạn", "type" => "Parent", "province_at" => null],
            ["id" => 8, "name" => "Tuyên quang", "type" => "Parent", "province_at" => null],
            ["id" => 10, "name" => "Lào Cai", "type" => "Parent", "province_at" => null],
            ["id" => 11, "name" => "Điện Biên", "type" => "Parent", "province_at" => null],
            ["id" => 12, "name" => "Lai Châu", "type" => "Parent", "province_at" => null],
            ["id" => 14, "name" => "Sơn La", "type" => "Parent", "province_at" => null],
            ["id" => 15, "name" => "Yên bái", "type" => "Parent", "province_at" => null],
            ["id" => 17, "name" => "Hòa Bình", "type" => "Parent", "province_at" => null],
            ["id" => 19, "name" => "Thái Nguyên", "type" => "Parent", "province_at" => null],
            ["id" => 20, "name" => "Lạng Sơn", "type" => "Parent", "province_at" => null],
            ["id" => 22, "name" => "Quảng Ninh", "type" => "Parent", "province_at" => null],
            ["id" => 24, "name" => "Bắc Giang", "type" => "Parent", "province_at" => null],
            ["id" => 25, "name" => "Phú Thọ", "type" => "Parent", "province_at" => null],
            ["id" => 26, "name" => "Vĩnh Phúc", "type" => "Parent", "province_at" => null],
            ["id" => 27, "name" => "Bắc Ninh", "type" => "Parent", "province_at" => null],
            ["id" => 30, "name" => "Hải Dương", "type" => "Parent", "province_at" => null],
            ["id" => 31, "name" => "Hải Phòng", "type" => "Parent", "province_at" => null],
            ["id" => 33, "name" => "Hưng Yên", "type" => "Parent", "province_at" => null],
            ["id" => 34, "name" => "Thái Bình", "type" => "Parent", "province_at" => null],
            ["id" => 35, "name" => "Hà Giang", "type" => "Parent", "province_at" => null],
            ["id" => 36, "name" => "Nam Định", "type" => "Parent", "province_at" => null],
            ["id" => 37, "name" => "Ninh Bình", "type" => "Parent", "province_at" => null],
            ["id" => 38, "name" => "Thanh Hóa", "type" => "Parent", "province_at" => null],
            ["id" => 40, "name" => "Nghệ An", "type" => "Parent", "province_at" => null],
            ["id" => 42, "name" => "Hà Tĩnh", "type" => "Parent", "province_at" => null],
            ["id" => 44, "name" => "Quảng Bình", "type" => "Parent", "province_at" => null],
            ["id" => 45, "name" => "Quảng Trị", "type" => "Parent", "province_at" => null],
            ["id" => 46, "name" => "Thừa thiên-Huế", "type" => "Parent", "province_at" => null],
            ["id" => 48, "name" => "Đà Nẵng", "type" => "Parent", "province_at" => null],
            ["id" => 49, "name" => "Quảng Nam", "type" => "Parent", "province_at" => null],
            ["id" => 51, "name" => "Quãng Ngãi", "type" => "Parent", "province_at" => null],
            ["id" => 52, "name" => "Bình Định", "type" => "Parent", "province_at" => null],
            ["id" => 54, "name" => "Phú Yên", "type" => "Parent", "province_at" => null],
            ["id" => 56, "name" => "Khánh Hòa", "type" => "Parent", "province_at" => null],
            ["id" => 58, "name" => "Ninh Thuận", "type" => "Parent", "province_at" => null],
            ["id" => 60, "name" => "Bình Thuận", "type" => "Parent", "province_at" => null],
            ["id" => 62, "name" => "Kon Tum", "type" => "Parent", "province_at" => null],
            ["id" => 64, "name" => "Gia Lai", "type" => "Parent", "province_at" => null],
            ["id" => 66, "name" => "Đắk Lắk", "type" => "Parent", "province_at" => null],
            ["id" => 67, "name" => "Đắk Nông", "type" => "Parent", "province_at" => null],
            ["id" => 68, "name" => "Lâm Đồng", "type" => "Parent", "province_at" => null],
            ["id" => 70, "name" => "Bình Phước", "type" => "Parent", "province_at" => null],
            ["id" => 72, "name" => "Tây Ninh", "type" => "Parent", "province_at" => null],
            ["id" => 74, "name" => "Bình Dương", "type" => "Parent", "province_at" => null],
            ["id" => 75, "name" => "Đồng Nai", "type" => "Parent", "province_at" => null],
            ["id" => 77, "name" => "Bà Rịa", "type" => "Parent", "province_at" => null],
            ["id" => 79, "name" => "Hồ Chí Minh", "type" => "Parent", "province_at" => null],
            ["id" => 80, "name" => "Long An", "type" => "Parent", "province_at" => null],
            ["id" => 82, "name" => "Tiền Giang", "type" => "Parent", "province_at" => null],
            ["id" => 83, "name" => "Bến Tre", "type" => "Parent", "province_at" => null],
            ["id" => 84, "name" => "Trà Vinh", "type" => "Parent", "province_at" => null],
            ["id" => 86, "name" => "Vĩnh Long", "type" => "Parent", "province_at" => null],
            ["id" => 87, "name" => "Đồng Tháp", "type" => "Parent", "province_at" => null],
            ["id" => 89, "name" => "An Giang", "type" => "Parent", "province_at" => null],
            ["id" => 91, "name" => "Kiên Giang", "type" => "Parent", "province_at" => null],
            ["id" => 92, "name" => "Cần Thơ", "type" => "Parent", "province_at" => null],
            ["id" => 93, "name" => "Hậu giang", "type" => "Parent", "province_at" => null],
            ["id" => 94, "name" => "Sóc Trăng", "type" => "Parent", "province_at" => null],
            ["id" => 95, "name" => "Bạc Liêu", "type" => "Parent", "province_at" => null],
            ["id" => 96, "name" => "Cà Mau", "type" => "Parent", "province_at" => null],
        ];
        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
    
}