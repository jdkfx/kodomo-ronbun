<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportAbstractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_abstracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->unsigned()->index();
            $table->text('contents_abstract');
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade'); // 外部キー参照
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_abstracts');
    }
}
