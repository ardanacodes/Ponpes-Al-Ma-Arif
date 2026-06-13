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
        Schema::create('p_p_d_b_s', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('gender');

            $table->string('birth_place');
            $table->date('birth_date');

            $table->text('address');

            $table->string('school_origin');

            $table->string('phone');

            $table->string('father_name');
            $table->string('mother_name');

            /*
    |--------------------------------------------------------------------------
    | PROGRAM
    |--------------------------------------------------------------------------
    */

            $table->enum('program_type', [
                'Mukim',
                'Non Mukim'
            ]);

            $table->enum('education_level', [
                'MTs',
                'SMA Plus',
                'SMK'
            ]);

            $table->string('major')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_p_d_b_s');
    }
};
