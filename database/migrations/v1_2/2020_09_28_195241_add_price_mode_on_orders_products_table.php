<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceModeOnOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( ! Schema::hasColumn( 'nexopos_orders_products', 'mode' ) ) {
            Schema::table( 'nexopos_orders_products', function( Blueprint $table ) {
                $table->string( 'mode' )->default( 'normal' ); // can be wholesale
            });
        }

        if ( ! Schema::hasColumn( 'nexopos_orders_products', 'unit_name' ) ) {
            Schema::table( 'nexopos_orders_products', function( Blueprint $table ) {
                $table->string( 'unit_name' )->nullable(); // can be wholesale
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ( Schema::hascolumn( 'nexopos_orders_products', 'mode' ) ) {
            Schema::table( 'nexopos_orders_products', function( Blueprint $table ) {
                $table->dropColumn( 'mode' );
            });
        }

        if ( Schema::hascolumn( 'nexopos_orders_products', 'unit_name' ) ) {
            Schema::table( 'nexopos_orders_products', function( Blueprint $table ) {
                $table->dropColumn( 'unit_name' );
            });
        }
    }
}
