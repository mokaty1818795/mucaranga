<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->foreign(['invoice_id'], 'fk_registrations_media1')->references(['id'])->on('media')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['bank_invoice_id'], 'fk_registrations_media2')->references(['id'])->on('media')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['payment_phase_id'], 'fk_registrations_payment_phases1')->references(['id'])->on('payment_phases')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['student_id'], 'fk_registrations_students1')->references(['id'])->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['processed_by_id'], 'fk_registrations_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropForeign('fk_registrations_media1');
            $table->dropForeign('fk_registrations_media2');
            $table->dropForeign('fk_registrations_payment_phases1');
            $table->dropForeign('fk_registrations_students1');
            $table->dropForeign('fk_registrations_users1');
        });
    }
}
