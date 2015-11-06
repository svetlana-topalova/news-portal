<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsTableDropApproved extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('news', function(Blueprint $table) {
                    $table->dropColumn('approved');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('news', function(Blueprint $table) {
                    $table->boolean('approved')->default(false);
                });
    }

}
