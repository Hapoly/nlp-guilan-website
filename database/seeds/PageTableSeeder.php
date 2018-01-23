<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
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
        ["title" => "about us", "body" => "about us body"],
        ["title" => "contact us", "body" => "contact us body"],
      ];
      foreach($data as $row)
        DB::table('pages')->insert($row);
    }
}
