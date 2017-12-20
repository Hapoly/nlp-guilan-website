<?php

use Illuminate\Database\Seeder;

class DatasetRequestTableSeeder extends Seeder
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
          'id'              => 1, 
          'title'           => 'dataset title', 
          'caption'         => 'caption of dataset', 
          'file_url'        => 'http://some-file.com', 
          'type'            => 1, 
          "publication_id"  => 1
        ],
      ];
      foreach($data as $row)
        DB::table('datasets')->insert($row);
    }
}
