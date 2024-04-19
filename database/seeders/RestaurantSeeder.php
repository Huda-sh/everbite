<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            ['name' => 'Haretna Restaurant', 'location' => 'Bab Touma - Old Town, Damascus'],
            ['name' => 'Pub شرقي', 'location' => 'Bab Charqi, 123 Damascus'],
            ['name' => 'Omaya Ice Cream', 'location' => 'بوظة امية .دمشق., 34517 Damascus'],
            ['name' => 'Ward Al Sham Restaurant', 'location' => 'Al-Mazzeh, Damascus'],
            ['name' => 'Em Sherif Restaurant', 'location' => 'Dummar, Damascus'],

            ['name'=>'Ivy Resto-Lounge ', 'location'=> 'Bab Touma - Old Town, Damascus'],
            ['name'=>'Naranj Restaurant ', 'location'=> 'Bab Charqi, 123 Damascus'],
            ['name'=>'Al Kamal ', 'location'=> 'Al-mazraa, Damascus'],
            ['name'=>'Elissar Restaurant ', 'location'=> 'Abo Remaneh, Damascus'],
            ['name'=>'Bait Fairouz', 'location'=> 'Bab Touma - Old Town, Damascus'],
            ['name'=>'Kan Zaman', 'location' => 'Bab Charqi, 123 Damascus'],
            ['name'=>'Boulevard Restaurant ', 'location'=> 'kafer soseh, Damascus'],
            ['name'=>'Gemini Restaurant ', 'location'=> 'Al-Mazzeh, Damascus'],
            ['name'=>'Chevalier Restaurant ', 'location'=> 'Dummar, Damascus'],
            ['name'=>'Al Nawforaa Café ', 'location'=> 'Bab Touma - Old Town, Damascus'],
            ['name'=>'Al sediq ', 'location'=> 'Abo Remaneh, Damascus'],
            ['name'=>'Beit Sitti', 'location'=> 'old city, Damascus'],
            ['name'=>'Aura By Dina ', 'location'=> 'Al-Mazzeh, Damascus'],
            ['name'=>'St.Paul Restaurant &Bar ', 'location'=> 'Dummar, Damascus'],
            ['name'=>'Alloh Pizza Shop ', 'location'=> 'Abo Remaneh, Damascus'],
        ];

        foreach ($restaurants as $restaurant) {
            DB::table('users')->insert([
                'name' => $restaurant['name'],
                'location' => $restaurant['location'],
                'email'=>fake()->unique()->safeEmail(),
                'phone_number'=>fake()->phoneNumber(),
                'password'=> Hash::make('password')
            ]);
        }
    }
}
