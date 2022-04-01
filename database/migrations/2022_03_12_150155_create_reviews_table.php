<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->integer('product_id')->index('fk_reviews_products1_idx');
            $table->integer('user_id')->index('fk_reviews_users1_idx');
            $table->integer('mark_id')->index('fk_reviews_marks1_idx');
            $table->string('title', 45);
            $table->text('description');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

            $table->primary(['product_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
