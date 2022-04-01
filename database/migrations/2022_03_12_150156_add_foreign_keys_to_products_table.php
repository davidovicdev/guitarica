<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['brand_id'], 'fk_products_brands1')->references(['id'])->on('brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['sub_category_id'], 'fk_products_sub_categories1')->references(['id'])->on('sub_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_products_brands1');
            $table->dropForeign('fk_products_sub_categories1');
        });
    }
}
