<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('roles')->insert([
        'name' => 'Admin',
        'id'   => 1,
      ]);
      DB::table('roles')->insert([
        'name' => 'Landlord',
        'id'   => 2,
      ]);
      DB::table('users')->insert([
        'id'        => 1,
        'name'      => 'admin',
        'role_id'   => 1,
        'is_active' => 1,
        'email'     => 'admin@admin.com',
        'password'  => '$2y$10$6bwPWXDKKgl46LemZtFjXu3sHyv9ce2kpLBC99uDz0flkXaDrDWo.',
      ]);
      DB::table('states')->insert([
        'id'        => 1,
        'name'      => 'Vermont',
      ]);
      DB::table('states')->insert([
        'id'        => 2,
        'name'      => 'New Hampshire',
      ]);
      DB::table('states')->insert([
        'id'        => 3,
        'name'      => 'Maine',
      ]);
      DB::table('states')->insert([
        'id'        => 4,
        'name'      => 'Massachusetts',
      ]);
      DB::table('states')->insert([
        'id'        => 5,
        'name'      => 'Connecticut',
      ]);
      DB::table('states')->insert([
        'id'        => 6,
        'name'      => 'Rhode Island',
      ]);
    }
}
