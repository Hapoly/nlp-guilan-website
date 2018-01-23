<?php

use Illuminate\Database\Seeder;

class AuthorPublicationTableSeeder extends Seeder
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
        ["publication_id" => 1, "author_id" => 1],
        ["publication_id" => 2, "author_id" => 2],
        ["publication_id" => 4, "author_id" => 3],
        ["publication_id" => 3, "author_id" => 4],
        ["publication_id" => 2, "author_id" => 5],
        ["publication_id" => 5, "author_id" => 6],
        ["publication_id" => 3, "author_id" => 7],
        ["publication_id" => 3, "author_id" => 3],
        ["publication_id" => 2, "author_id" => 4],
        ["publication_id" => 5, "author_id" => 6],
        ["publication_id" => 3, "author_id" => 3],
        ["publication_id" => 3, "author_id" => 2],
        ["publication_id" => 2, "author_id" => 4],
        ["publication_id" => 4, "author_id" => 1],
        ["publication_id" => 3, "author_id" => 3],
      ];
      foreach($data as $row)
        DB::table('author_publication')->insert($row);
    }
}
