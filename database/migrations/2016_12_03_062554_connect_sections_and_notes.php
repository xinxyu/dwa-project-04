<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectSectionsAndNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {

            # fk fields
            $table->integer('section_id')->unsigned();

            # This field 'section_id' is a foreign key that connects to the 'id' field in the 'sections' table
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {


            $table->dropForeign('notes_section_id_foreign');

            $table->dropColumn('section_id');
        });
    }
}
