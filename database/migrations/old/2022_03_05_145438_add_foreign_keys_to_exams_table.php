<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->foreign(['exam_tpye_id'], 'fk_exams_exam_tpyes1')->references(['id'])->on('exam_tpyes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['bank_invoice_id'], 'fk_exams_media1')->references(['id'])->on('media')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['invoice_id'], 'fk_exams_media2')->references(['id'])->on('media')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['student_id'], 'fk_exams_students1')->references(['id'])->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['processed_by_id'], 'fk_exams_users1')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropForeign('fk_exams_exam_tpyes1');
            $table->dropForeign('fk_exams_media1');
            $table->dropForeign('fk_exams_media2');
            $table->dropForeign('fk_exams_students1');
            $table->dropForeign('fk_exams_users1');
        });
    }
}
