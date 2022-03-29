<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransportadoraSeeder extends Seeder
{
    const TRANSPORTADORAS = [
        'Transportadora 1',
        'Transportadora 2',
        'Transportadora 3',
        'Transportadora 4',
        'Transportadora 5',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carriers = self::TRANSPORTADORAS;

        foreach ($carriers as $carrier) {
            $hasCarrier = DB::table('transportadoras')->where('nome', $carrier)->first();

            if (!$hasCarrier) {
                DB::table('transportadoras')->insert([
                    'nome' => $carrier,
                    'created_at' => (Carbon::now())->format('Y-m-d H:i:s'),
                    'updated_at' => (Carbon::now())->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
