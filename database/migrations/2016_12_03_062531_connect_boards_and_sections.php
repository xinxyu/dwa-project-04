<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBoardsAndSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {


            # fk fields
            $table->integer('board_id')->unsigned();

            # This field 'board_id' is a foreign key that connects to the 'id' field in the 'boards' table
            $table->foreign('board_id')->references('id')->on('boards');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {

            $table->dropForeign('sections_board_id_foreign');

            $table->dropColumn('board_id');

        });
    }
}
