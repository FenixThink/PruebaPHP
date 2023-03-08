<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use GuzzleHttp\Client;
use App\Models\Country;
use App\Models\Category;
use App\Http\Controllers\CountryController;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $response = $client->get('https://restcountries.com/v3.1/region/South%20America');

        $data = $response->getBody()->getContents();
        $paises = json_decode($data);
        foreach ($paises as $pais) {
            Country::create([
                'nameCountries' => $pais->name->common,
                // Agrega otras propiedades que correspondan a la tabla de países.
            ]);
        }
        $categorys = ['Cliente','Proovedor','Funcionamiento Interno'];
        foreach ($categorys as $category) {
            Category::create([
                'nameCategories' => $category,
                // Agrega otras propiedades que correspondan a la tabla de países.
            ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
