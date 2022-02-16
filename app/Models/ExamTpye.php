<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExamTpye
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $price
 * 
 * @property Exam $exam
 *
 * @package App\Models
 */
class ExamTpye extends Model
{
	protected $table = 'exam_tpyes';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'price'
	];

	public function exam()
	{
		return $this->hasOne(Exam::class);
	}
}
