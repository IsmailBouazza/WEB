<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToItempremia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itempremia', function (Blueprint $table) {
            //

            $table->foreign('item_id')
                ->references('id')
                ->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itempremia', function (Blueprint $table) {
            //
            $table->dropForeign('item_id');
        });
    }
}
