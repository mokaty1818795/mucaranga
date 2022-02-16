<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassRoomStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_room_students', function (Blueprint $table) {
            $table->foreign(['class_rooms_id'], 'fk_class_rooms_has_students_class_rooms1')->references(['id'])->on('class_rooms')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['students_id'], 'fk_class_rooms_has_students_students1')->references(['id'])->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_room_students', function (Blueprint $table) {
            $table->dropForeign('fk_class_rooms_has_students_class_rooms1');
            $table->dropForeign('fk_class_rooms_has_students_students1');
        });
    }
}
