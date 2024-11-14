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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('gender', ['male', 'female']);
            $table->string('Nationality');
            $table->string('Birthday');
            $table->string('levelOfPlayer');
            $table->string('position');
            $table->float('weight');
            $table->float('height');
            $table->string('schoolName');
            $table->enum('ageCategory' ,['under 18' , 'under 12' ,'under 9']);
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
