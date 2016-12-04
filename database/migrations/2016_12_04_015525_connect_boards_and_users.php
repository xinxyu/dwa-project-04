<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBoardsAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boards', function (Blueprint $table) {

            # fk fields
            $table->integer('user_id')->unsigned();

            # This field 'section_id' is a foreign key that connects to the 'id' field in the 'sections' table
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boards', function (Blueprint $table) {

            $table->dropForeign('boards_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
