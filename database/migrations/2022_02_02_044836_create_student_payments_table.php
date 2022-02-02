<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('students_id')->index('fk_students_has_payment_phases_students1_idx');
            $table->unsignedBigInteger('payment_phases_id')->index('fk_students_has_payment_phases_payment_phases1_idx');
            $table->bigIncrements('id');
            $table->timestamp('payed_at')->nullable();
            $table->double('credit')->nullable()->default(0);
            $table->double('debit')->nullable()->default(0);
            $table->timestamp('to_pay_at')->nullable();
            $table->boolean('is_payed')->nullable()->default(false);
            $table->string('created_by_name')->nullable();
            $table->unsignedBigInteger('created_by_id')->index('fk_student_payments_users1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_payments');
    }
}
