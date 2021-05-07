<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Spp;
class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $spp = [[
            'tahun'=>2020,'nominal'=>550000,'created_at'=>now(),'updated_at'=>now()
        ],[
            'tahun'=>2021,'nominal'=>600000,'created_at'=>now(),'updated_at'=>now()
        ]
    ];
    Spp::insert($spp);
    }
}
