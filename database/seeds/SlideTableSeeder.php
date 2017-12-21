<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\FileSystem;
class SlideTableSeeder extends Seeder
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
      ];
      foreach($data as $row)
        DB::table('slides')->insert($row);
    }
}
