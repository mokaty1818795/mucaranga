<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->timestamp('birth_day');
            $table->unsignedBigInteger('civil_state_id')->index('fk_students_civil_states1_idx');
            $table->string('natural_of')->nullable();
            $table->string('natural_location')->nullable();
            $table->string('natural_district', 25)->nullable();
            $table->string('natural_province')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('place_location')->nullable();
            $table->string('place_district')->nullable();
            $table->string('place_province')->nullable();
            $table->string('place_zone')->nullable();
            $table->string('id_identity')->nullable();
            $table->timestamp('id_emision_date')->nullable();
            $table->string('id_emited_with')->nullable();
            $table->timestamp('admited_at')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('veicle_classe_id')->index('fk_students_veicle_classes1_idx');
            $table->string('student_code')->nullable();
            $table->float('test_1', 10, 0)->nullable();
            $table->float('test_2', 10, 0)->nullable();
            $table->float('test_3', 10, 0)->nullable();
            $table->float('test_4', 10, 0)->nullable();
            $table->integer('teoric_lessons')->nullable();
            $table->integer('pratice_lessons')->nullable();
            $table->integer('tecnic_lessons')->nullable();
            $table->float('result', 10, 0)->nullable();
            $table->boolean('genre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
