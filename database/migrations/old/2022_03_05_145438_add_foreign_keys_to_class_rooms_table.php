<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_rooms', function (Blueprint $table) {
            $table->foreign(['period_id'], 'fk_class_rooms_periods1')->references(['id'])->on('periods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['instructor_id'], 'fk_class_rooms_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_rooms', function (Blueprint $table) {
            $table->dropForeign('fk_class_rooms_periods1');
            $table->dropForeign('fk_class_rooms_users1');
        });
    }
}
