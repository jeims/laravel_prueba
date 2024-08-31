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
        Schema::create('courses', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('prefix', 45)->nullable();
            $table->string('course_name',255)->unique();
            $table->unsignedInteger('interest_level_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

        
            $table->foreign('interest_level_id')->references('id')->on('interest_levels')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['interest_level_id']);
        });
        Schema::dropIfExists('courses');
    }
};
