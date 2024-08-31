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
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('last_name')->nullable()->after('name');
            $table->string('mother_last_name')->nullable()->after('last_name');
             $table->integer('age')->nullable()->after('mother_last_name');
            $table->unsignedInteger('gender_id')->nullable()->after('age');
            $table->unsignedInteger('civil_status_id')->nullable()->after('gender_id');
            $table->unsignedInteger('course_id')->nullable()->after('civil_status_id');
            $table->tinyInteger('status')->default(1)->after('password');

            // Add foreign keys
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('civil_status_id')->references('id')->on('civil_statuses')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        
            $table->dropForeign(['gender_id']);
            $table->dropForeign(['civil_status_id']);
            $table->dropForeign(['interest_level_id']);

         
            $table->dropColumn(['last_name', 'mother_last_name','age', 'gender_id', 'civil_status_id', 'interest_level_id', 'status']);
        });
    }
};
