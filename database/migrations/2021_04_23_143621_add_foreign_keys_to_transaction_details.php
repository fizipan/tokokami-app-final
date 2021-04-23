<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->foreign('transactions_id', 'transactions_id_fk9')
                    ->references('id')
                    ->on('transactions')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
            $table->foreign('products_id', 'products_id_fk10')
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
        Schema::table('transaction_details', function (Blueprint $table) {
            $table->dropForeign('transactions_id_fk9');
            $table->dropForeign('products_id_fk10');
        });
    }
}
