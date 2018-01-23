<?php

use Illuminate\Database\Seeder;

class PublicationTableSeeder extends Seeder
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
        ['id' => 1, 'title' => 'publication 1', 'target' => 'target 1', 'year' => 2012, 'type'  => 1],
        ['id' => 2, 'title' => 'publication 2', 'target' => 'target 1', 'year' => 2009, 'type'  => 2],
        ['id' => 3, 'title' => 'publication 3', 'target' => 'target 2', 'year' => 2013, 'type'  => 1],
        ['id' => 4, 'title' => 'publication 4', 'target' => 'target 1', 'year' => 2011, 'type'  => 1],
        ['id' => 5, 'title' => 'publication 5', 'target' => 'target 3', 'year' => 2011, 'type'  => 2],
      ];
      foreach($data as $row)
        DB::table('publications')->insert($row);
    }
}
