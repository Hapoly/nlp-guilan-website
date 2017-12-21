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
        [
          "title"  =>  "NLP group in guilan", 
          "caption" => "this is NLP group of guilan university site", 
          "image_url" => "http://images.addictionblog.org/cherrycake/wp-content/uploads/2017/07/NLP-Addiction-Technique-Addiction-Through-the-Lens-of-NLP-Presuppositions-2.jpg"
        ],
        [
          "title"  =>  "publications and NLP researchers", 
          "caption" => "we have some NLP publications here you can enjoy!", 
          "image_url" => "https://www.nlpco.com/wp-content/uploads/2016/01/NLP-Brain-Change-Mindset-Self-Motivation-Achievement.png"
        ],
        [
          "title"  =>  "usefull datasets", 
          "caption" => "some usefull datasets that you can request to get them or download them for free", 
          "image_url" => "https://image.slidesharecdn.com/siopf-160502173753/95/using-deep-learning-and-nlp-to-predict-performance-from-resumes-14-638.jpg?cb=1462210774"
        ],
      ];
      foreach($data as $row)
        DB::table('slides')->insert($row);
    }
}
