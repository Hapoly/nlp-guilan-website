<?php

use Illuminate\Database\Seeder;

class DatasetTableSeeder extends Seeder
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
          'id' => 1, 
          'name'  => 'alireza darbandi', 
          'use_case' => 'university project', 
          'university' => 'gu', 
          'email'  => 'darbandi1996@gmil.com', 
          "dataset_id" => 1
        ],
      ];
      foreach($data as $row)
        DB::table('dataset_request')->insert($row);
    }
}
