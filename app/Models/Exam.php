<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Exam
 *
 * @property int $exam_tpye_id
 * @property int $student_id
 * @property int|null $bank_invoice_id
 * @property int|null $invoice_id
 * @property int $processed_by_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $todo_at
 * @property Carbon|null $done_at
 * @property float|null $result
 *
 * @property ExamTpye $exam_tpye
 * @property Medium|null $medium
 * @property Student $student
 * @property User $user
 *
 * @package App\Models
 */
class Exam extends Model implements HasMedia
{
    use InteractsWithMedia;
	protected $table = 'exams';

	protected $casts = [
		'exam_tpye_id' => 'int',
		'student_id' => 'int',
		'bank_invoice_id' => 'int',
		'invoice_id' => 'int',
		'processed_by_id' => 'int',
		'result' => 'float'
	];

	protected $dates = [
		'todo_at',
		'done_at'
	];

	protected $fillable = [
		'exam_tpye_id',
		'student_id',
		'bank_invoice_id',
		'invoice_id',
		'processed_by_id',
		'todo_at',
		'done_at',
		'result'
	];
    
	public function exam_tpye()
	{
		return $this->belongsTo(ExamTpye::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function processedBy()
	{
		return $this->belongsTo(User::class, 'processed_by_id');
	}
}
