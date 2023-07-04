<?php

namespace Database\Seeders\Site;

use App\Models\Site\Home;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::create([
            'user_id' => 1,
            'title' => 'Alendre',
            'subtitle' => 'Atelier',
            'descriptions' => 'We are a team developer we create web, mobile and desktop projects.',
            'email' => 'contact@alendre.com.br',
            'phone' => '+55 41 9 9101-7166',
            'address' => 'St. Dona saza lattes, 283',
            'neighborhood' => 'Uberaba',
            'city' => 'Curitiba',
            'state' => 'PR',
        ]);
    }
}