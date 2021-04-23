<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regencies', function (Blueprint $table) {
            $table->foreign('provinces_id', 'provinces_id_fk12')
                    ->references('id')
                    ->on('provinces')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regencies', function (Blueprint $table) {
            $table->dropForeign('provinces_id_fk12');
        });
    }
}
