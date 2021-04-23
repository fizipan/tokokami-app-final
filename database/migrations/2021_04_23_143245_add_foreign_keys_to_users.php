<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('provinces_id', 'provinces_id_fk1')
                    ->references('id')
                    ->on('provinces')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');
            $table->foreign('regencies_id', 'regencies_id_fk2')
                    ->references('id')
                    ->on('regencies')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('provinces_id_fk1');
            $table->dropForeign('regencies_id_fk2');
        });
    }
}
