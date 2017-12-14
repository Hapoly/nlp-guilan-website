<?php

use Illuminate\Database\Seeder;

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
        ["title"  =>  "slide 1", "caption" => "caption 1"],
        ["title"  =>  "slide 2", "caption" => "caption 2"],
        ["title"  =>  "slide 3", "caption" => "caption 3"],
        ["title"  =>  "slide 4", "caption" => "caption 4"],
        
      ];
      foreach($data as $row)
        DB::table('slides')->insert($row);
    }
}
