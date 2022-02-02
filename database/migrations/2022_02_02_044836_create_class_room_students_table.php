<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_room_students', function (Blueprint $table) {
            $table->unsignedBigInteger('class_rooms_id')->index('fk_class_rooms_has_students_class_rooms1_idx');
            $table->unsignedBigInteger('students_id')->index('fk_class_rooms_has_students_students1_idx');
            $table->bigIncrements('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_room_students');
    }
}
