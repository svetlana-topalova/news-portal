<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('title', 255);
                    $table->text('content');
                    $table->boolean('approved')->default(false);
                    $table->integer('created_by')->unsigned();
                    $table->integer('approved_by')->unsigned()->nullable();
                    $table->timestamps();
                });
        Schema::table('news', function(Blueprint $table) {
                    $table->foreign('created_by')->references('id')->on('users')
                            ->onDelete('restrict')
                            ->onUpdate('restrict');
                });
        Schema::table('news', function(Blueprint $table) {
                    $table->foreign('approved_by')->references('id')->on('users')
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
                    $table->dropForeign('news_created_by_foreign');
                });
        Schema::table('news', function(Blueprint $table) {
                    $table->dropForeign('news_approved_by_foreign');
                });
        Schema::drop('news');
    }

}
