<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        post::create([
            'title' => 'title 1',
            'body' => 'body 1',
            'location_id' => '1', 
            'status' => '0'
         ]);
        post::create([
            'title' => 'title 2',
            'body' => 'body 2',
            'location_id' => '1',  
            'status' => '0'
         ]);
         post::create([
            'title' => 'hi',
            'body' => 'test',
            'location_id' => '1',  
            'status' => '0'
         ]);
         post::create([
            'title' => 'ape tu',
            'body' => 'ape tu',
            'location_id' => '1',  
            'status' => '0'
         ]);
         post::create([
            'title' => 'aku',
            'body' => 'kamu',
            'location_id' => '1',  
            'status' => '0'
         ]);

       
    }
}
