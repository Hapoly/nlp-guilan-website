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
      DB::table('publications')->insert([
        'title'     => 'sample publications',
        'target'    => 'sample target',
        'year'      => 2012,
        'status'    => 1,
        'type'      => 1
      ]);
      // $publication = new app\Publication;
      // echo 'testing!';
      // $publication->title = 'sample publication';
      // $publication->target = 'sample target';
      // $publication->year = 2012;
      // $publication->status = 1;
      // $publication->type = 1;

      // $publication->save();
    }
}
