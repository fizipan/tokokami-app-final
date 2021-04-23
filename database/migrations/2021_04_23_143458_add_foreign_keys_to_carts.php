<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('users_id', 'users_id_fk5')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');
            $table->foreign('products_id', 'products_id_fk6')
                    ->references('id')
                    ->on('products')
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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign('users_id_fk5');
            $table->dropForeign('products_id_fk6');
        });
    }
}
