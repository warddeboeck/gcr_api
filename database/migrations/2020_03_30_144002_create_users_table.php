<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('discipline_id');
            $table->string('name')->nullable();
            $table->string('email');
            // $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['super', 'reviewer', 'creative'])->default('creative');
            $table->string('password')->nullable();
            $table->string('function')->nullable();
            $table->string('agency')->nullable();
            $table->string('country')->nullable();
            $table->string('idea_url')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();

            $table->foreign('discipline_id')
                  ->references('id')
                  ->on('disciplines')
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
        Schema::dropIfExists('users');
    }
}
