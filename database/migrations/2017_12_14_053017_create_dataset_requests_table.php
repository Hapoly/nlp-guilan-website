<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataset_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->collation('utf8_persian_ci');
            $table->string('university', 64)->collation('utf8_persian_ci');
            $table->string('email', 64)->collation('utf8_persian_ci');
            $table->string('use_case', 200)->collation('utf8_persian_ci');
            $table->integer('dataset_id')->index();
            $table->unsignedSmallInteger('status')->default(1); // 1 => pending, 2 => accepted (sent to mail), 3 => refused (sent to mail)
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
        Schema::dropIfExists('dataset_request');
    }
}
