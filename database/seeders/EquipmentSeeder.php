<?php

namespace Database\Seeders;

use App\Models\Components\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config("icons.service");
        $Equipment = Equipment::firstWhere("lang", config('app.fallback_locale'));
        $Equipment->update(["equipments" => json_encode($data)]);
    }
}
