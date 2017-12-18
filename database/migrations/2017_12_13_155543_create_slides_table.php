<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('slides', function (Blueprint $table) {
      $table->charset = 'utf8';
      $table->collation = 'utf8_persian_ci';

      $table->increments('id');
      $table->string('title', 64);
      $table->string('caption', 128);
      $table->string('image_url');
      $table->string('target_link')->default('#');
      $table->unsignedSmallInteger('status')->default(1);
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('slides');
  }
}
