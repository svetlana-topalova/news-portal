<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StatusesTableSeeder
 *
 * @author Svetljo
 */
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder {

    public function run() {
        DB::table('statuses')->delete();

        $statuses = array(
            ['id' => 1, 'title' => 'Started', 'slug' => 'started'],
            ['id' => 2, 'title' => 'Waiting for approval', 'slug' => 'waiting_for_approval'],
            ['id' => 3, 'title' => 'Approved', 'slug' => 'approved'],
        );

        DB::table('statuses')->insert($statuses);
    }

}

?>
