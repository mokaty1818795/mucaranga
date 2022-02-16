<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_phase_id')->index('fk_registrations_payment_phases1_idx');
            $table->unsignedBigInteger('student_id')->index('fk_registrations_students1_idx');
            $table->unsignedBigInteger('processed_by_id')->index('fk_registrations_users1_idx');
            $table->unsignedBigInteger('invoice_id')->nullable()->index('fk_registrations_media1_idx');
            $table->timestamps();
            $table->unsignedBigInteger('bank_invoice_id')->nullable()->index('fk_registrations_media2_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
