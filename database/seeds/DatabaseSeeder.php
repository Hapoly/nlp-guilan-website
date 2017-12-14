<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PublicationTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(AuthorPublicationTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(DatasetTableSeeder::class);
        $this->call(DatasetRequestTableSeeder::class);
    }
}
