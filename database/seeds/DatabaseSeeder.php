<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);

        factory(App\Town::class, 5)->create()->each(function($town){
          factory(App\Property::class, 2)->create([
            'state_id' => $town->state_id,
            'town_id'  => $town->id,
          ])->each(function($property){
            factory(App\Photo::class)->create([
              'property_id' => $property->id,
            ]);
          });
        });
    }
}
