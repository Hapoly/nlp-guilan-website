<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
        fake data
      */
      $data = [
        [
          "id"                => 1,
          "name"          => "admin",
          "email"             => "admin@gmail.com",
          "password"          => "$2y$10$8dNxMMXyrTj9qSPrnMdk/eKXpAUpeaI.B1pxQkhSooh8/V9O1NQHW",
          "status"            => 1,
          "permission_level"  => 2,
        ],
      ];
      foreach($data as $row)
        DB::table('users')->insert($row);
    }
}
