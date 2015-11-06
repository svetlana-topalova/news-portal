<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysUsersRolesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users_roles', function(Blueprint $table) {
                    $table->integer('user_id')->unsigned()->change();
                    $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');

                    $table->integer('role_id')->unsigned()->change();
                    $table->foreign('role_id')
                            ->references('id')
                            ->on('roles')
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
        Schema::table('users_roles', function (Blueprint $table) {
                    $table->dropForeign('users_roles_user_id_foreign');
                });
        Schema::table('users_roles', function (Blueprint $table) {
                    $table->dropForeign('users_roles_role_id_foreign');
                });
    }

}
