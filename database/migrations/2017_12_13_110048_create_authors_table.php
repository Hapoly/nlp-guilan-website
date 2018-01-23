<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_persian_ci';

          $table->increments('id');
          $table->string('name', 64);
          $table->string('profile_url', 64);
          $table->unsignedSmallInteger('graduation_status');
          $table->unsignedSmallInteger('position');
          $table->string('biography', 1000);
          $table->unsignedSmallInteger('status')->default(1);
          $table->unsignedSmallInteger('shown')->default(1);
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
        Schema::dropIfExists('authors');
    }
}
