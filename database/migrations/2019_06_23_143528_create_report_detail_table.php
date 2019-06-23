<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->unsigned()->index();
            // $table->integer('category_id')->unsined()->index();
            $table->string('thumbnail');
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade'); // 外部キー参照
            // $table->foreign('category_id')->references('id')->on('categories'); // 外部キー参照
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_details');
    }
}
