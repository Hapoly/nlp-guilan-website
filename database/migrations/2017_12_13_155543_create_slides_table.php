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
      $table->increments('id');
      $table->string('title', 64)->collation('utf8_presian_ci');
      $table->string('caption', 128)->collation('utf8_presian_ci');
      $table->string('image_url')->collation('utf8_persian_ci');
      $table->string('target_link')->default('#')->collation('utf8_presian_ci');
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
