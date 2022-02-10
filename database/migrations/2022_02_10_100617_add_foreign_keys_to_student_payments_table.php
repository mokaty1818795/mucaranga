<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->foreign(['payment_phases_id'], 'fk_students_has_payment_phases_payment_phases1')->references(['id'])->on('payment_phases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['students_id'], 'fk_students_has_payment_phases_students1')->references(['id'])->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['created_by_id'], 'fk_student_payments_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->dropForeign('fk_students_has_payment_phases_payment_phases1');
            $table->dropForeign('fk_students_has_payment_phases_students1');
            $table->dropForeign('fk_student_payments_users1');
        });
    }
}
