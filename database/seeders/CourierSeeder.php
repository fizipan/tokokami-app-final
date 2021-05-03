<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // POS, JNE, TIKI
        $data = [
            [
                "name" => 'JNE',
                "code" => 'jne',
            ],
            [
                "name" => 'POS',
                "code" => 'pos',
            ],
            [
                "name" => 'TIKI',
                "code" => 'tiki',
            ],
        ];

        Courier::insert($data);


    }
}
