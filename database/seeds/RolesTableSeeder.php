<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RolesTableSeeder
 *
 * @author Svetljo
 */
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

    public function run() {
        DB::table('roles')->delete();

        $roles = array(
            ['id' => 1, 'title' => 'Administrator', 'slug' => 'admin', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'title' => 'Editor', 'slug' => 'editor', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'title' => 'User', 'slug' => 'user', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        DB::table('roles')->insert($roles);
    }

}

?>
