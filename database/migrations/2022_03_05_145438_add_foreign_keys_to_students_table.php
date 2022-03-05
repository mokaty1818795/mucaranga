<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreign(['civil_state_id'], 'fk_students_civil_states1_idx')->references(['id'])->on('civil_states')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['veicle_classe_id'], 'fk_students_veicle_classes1')->references(['id'])->on('veicle_classes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('fk_students_civil_states1_idx');
            $table->dropForeign('fk_students_veicle_classes1');
        });
    }
}
