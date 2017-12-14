<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
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
        ['id' => 1, "name" => 'author 1', 'graduation_status' => 1, 'position' => 2, 'biography' => 'some biography 1'],
        ['id' => 2, "name" => 'author 2', 'graduation_status' => 2, 'position' => 1, 'biography' => 'some biography 2'],
        ['id' => 3, "name" => 'author 3', 'graduation_status' => 2, 'position' => 2, 'biography' => 'some biography 3'],
        ['id' => 4, "name" => 'author 4', 'graduation_status' => 1, 'position' => 2, 'biography' => 'some biography 4'],
        ['id' => 5, "name" => 'author 5', 'graduation_status' => 2, 'position' => 1, 'biography' => 'some biography 5'],
        ['id' => 6, "name" => 'author 6', 'graduation_status' => 2, 'position' => 2, 'biography' => 'some biography 6'],
        ['id' => 7, "name" => 'author 7', 'graduation_status' => 3, 'position' => 3, 'biography' => 'some biography 7'],
      ];
      foreach($data as $row)
        DB::table('authors')->insert($row);
    }
}
