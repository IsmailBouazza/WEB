<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToUsercomments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usercomments', function (Blueprint $table) {
            //


            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('userreviewer_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usercomments', function (Blueprint $table) {
            //
            $table->dropForeign('user_id');
            $table->dropForeign('userreviewer_id');
        });
    }
}
