<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_tpye_id')->index('fk_exams_exam_tpyes1_idx');
            $table->unsignedBigInteger('student_id')->index('fk_exams_students1_idx');
            $table->unsignedBigInteger('bank_invoice_id')->nullable()->index('fk_exams_media1_idx');
            $table->unsignedBigInteger('invoice_id')->nullable()->index('fk_exams_media2_idx');
            $table->unsignedBigInteger('processed_by_id')->index('fk_exams_users1_idx');
            $table->timestamps();
            $table->timestamp('todo_at')->nullable();
            $table->timestamp('done_at')->nullable();
            $table->double('result')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
