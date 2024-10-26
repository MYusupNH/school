<?php

use App\Models\Student;
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
        Schema::create('pps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class, 'student_id');
            $table->double('1')->unsigned()->nullable();
            $table->double('2')->unsigned()->nullable();
            $table->double('3')->unsigned()->nullable();
            $table->double('4')->unsigned()->nullable();
            $table->double('5')->unsigned()->nullable();
            $table->double('6')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pps');
    }
};
