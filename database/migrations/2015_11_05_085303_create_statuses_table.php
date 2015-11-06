<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('statuses', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('title', 50);
                    $table->string('slug', 10);
                });
        Schema::table('news', function(Blueprint $table) {
                    $table->integer('status')->unsigned();
                    $table->foreign('status')->references('id')->on('statuses')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('news', function(Blueprint $table) {
                    $table->dropForeign('news_status_foreign');
                });
        Schema::drop('statuses');
    }

}
