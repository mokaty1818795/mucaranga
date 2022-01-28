<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentPayment
 * 
 * @property int $students_id
 * @property int $payment_phases_id
 * @property int $id
 * @property Carbon|null $payed_at
 * @property float|null $credit
 * @property float|null $debit
 * @property Carbon|null $to_pay_at
 * @property bool|null $is_payed
 * @property string|null $created_by_name
 * @property int $created_by_id
 * 
 * @property User $user
 * @property PaymentPhase $payment_phase
 * @property Student $student
 *
 * @package App\Models
 */
class StudentPayment extends Model
{
	protected $table = 'student_payments';
	public $timestamps = false;

	protected $casts = [
		'students_id' => 'int',
		'payment_phases_id' => 'int',
		'credit' => 'float',
		'debit' => 'float',
		'is_payed' => 'bool',
		'created_by_id' => 'int'
	];

	protected $dates = [
		'payed_at',
		'to_pay_at'
	];

	protected $fillable = [
		'students_id',
		'payment_phases_id',
		'payed_at',
		'credit',
		'debit',
		'to_pay_at',
		'is_payed',
		'created_by_name',
		'created_by_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by_id');
	}

	public function payment_phase()
	{
		return $this->belongsTo(PaymentPhase::class, 'payment_phases_id');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'students_id');
	}
}
