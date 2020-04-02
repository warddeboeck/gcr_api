<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReviewerCreativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewer_creative', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('reviewer_id');
            $table->unsignedBigInteger('creative_id');
            $table->string('idea_uuid');
            $table->timestamps();

            $table->foreign('reviewer_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            $table->foreign('creative_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
