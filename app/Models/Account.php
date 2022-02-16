<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * 
 * @property int $id
 * @property float|null $debt
 * @property float|null $current_balance
 * @property float|null $payment_status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $student_id
 * 
 * @property Student $student
 *
 * @package App\Models
 */
class Account extends Model
{
	protected $table = 'accounts';

	protected $casts = [
		'debt' => 'float',
		'current_balance' => 'float',
		'payment_status' => 'float',
		'student_id' => 'int'
	];

	protected $fillable = [
		'debt',
		'current_balance',
		'payment_status',
		'student_id'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
