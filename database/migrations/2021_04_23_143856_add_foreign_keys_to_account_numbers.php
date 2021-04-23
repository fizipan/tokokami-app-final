<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_numbers', function (Blueprint $table) {
            $table->foreign('payments_id', 'payments_id_fk11')
                    ->references('id')
                    ->on('payments')
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
        Schema::table('account_numbers', function (Blueprint $table) {
            $table->dropForeign('payments_id_fk11');
        });
    }
}
