<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tweets')->insert(
            array(
                array('message' => 'test',
                    'user_id' => '1',
                    'created_at' => date("Y-m-d H:i:s"),
            ),
                array('message' => 'test2',
                    'user_id' => '1',
                    'created_at' => date("Y-m-d H:i:s"),
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
