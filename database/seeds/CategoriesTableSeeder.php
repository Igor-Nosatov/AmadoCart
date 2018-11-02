<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('category')->insert(['name' => 'Chairs','slug' => 'chairs']);
      DB::table('category')->insert(['name' => 'Beds','slug' => 'beds']);
      DB::table('category')->insert(['name' => 'Accesories','slug' => 'accesories']);
      DB::table('category')->insert(['name' => 'Furniture','slug' => 'furniture']);
      DB::table('category')->insert(['name' => 'Home Deco','slug' => 'deco']);
      DB::table('category')->insert(['name' => 'Dressings','slug' => 'dressings']);
      DB::table('category')->insert(['name' => 'Tables','slug' => 'tables']);
    }
}
