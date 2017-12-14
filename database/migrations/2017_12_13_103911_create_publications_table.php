<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('publications', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title', 128)->collation('utf8_presian_ci');;
        $table->string('target', 128)->collation('utf8_presian_ci');;
        $table->unsignedInteger('year');
        $table->unsignedSmallInteger('type');
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
        Schema::dropIfExists('publications');
    }
}
