<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->boolean('status')->default(1)->comment('1: Active, 0:Inactive');

        });


        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('username', 100);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->rememberToken();
            $table->unsignedBigInteger('role')->default(1);
            $table->foreign('role')->references('id')->on('user_group');
            $table->boolean('status')->default(1)->comment('1: Active, 0:Inactive');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_group');
        Schema::dropIfExists('users');
    }
};
