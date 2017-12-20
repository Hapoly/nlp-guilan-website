<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
          $table->charset = 'utf8';
          $table->collation = 'utf8_persian_ci';

          $table->increments('id');
          $table->string('title', '128');
          $table->string('caption', '1000')->collation('utf8_persian_ci');
          $table->unsignedSmallInteger('type')->default(1); // 1 => downloadble, 2 => have to request
          $table->string('file_url')->collation('utf8_persian_ci');
          $table->unsignedSmallInteger('status')->default(1);
          $table->integer('publication_id')->index();
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
        Schema::dropIfExists('datasets');
    }
}
