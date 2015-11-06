<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNewsTableChangeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function(Blueprint $table) {
                    $table->renameColumn('status', 'status_id');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function(Blueprint $table) {
                    $table->renameColumn('status_id', 'status');
                });
    }
}
