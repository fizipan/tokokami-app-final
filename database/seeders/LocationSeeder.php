<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Regency;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = RajaOngkir::provinsi()->all();
        foreach ($provinces as $province) {
            Province::create([
                'name' => $province['province'],
            ]);

            $regencies = RajaOngkir::kota()->dariProvinsi($province['province_id'])->get();
            foreach ($regencies as $regency) {
                Regency::create([
                    'provinces_id' => $province['province_id'],
                    'city_id' => $regency['city_id'],
                    'name' => $regency['city_name'],
                ]);
            }
        }
    }
}
