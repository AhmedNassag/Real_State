<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;

use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Area;
use App\Models\Branch;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User
        User::create([
            'name'     => 'User',
            'email'    => 'user@gmail.com',
            'mobile'   => '0123456789',
            'password' => bcrypt('12345678'),
            'photo'    => 'avatar.jpg',
            'status'   => 1,
        ]);



        //Country
        Country::create([
            'name' => 'Country',
        ]);



        //City
        City::create([
            'name'       => 'City',
            'country_id' => 1,
        ]);



        //Area
        Area::create([
            'name'    => 'Area',
            'city_id' => 1,
        ]);



        //Branch
        Branch::create([
            'name'        => 'Branch',
            'firstPhone'  => '01000000000',
            'secondPhone' => '01111111111',
            'address'     => '19A, Al-Obour Buildings, Salah Salem',
            'area_id'     => 1,
        ]);










        //Category
        Category::create([
            'name' => 'Category',
        ]);


        //Product
        Product::create([
            'name'        => 'Product 1',
            'price'       => 100,
            'category_id' => 1,
        ]);
    }
}
