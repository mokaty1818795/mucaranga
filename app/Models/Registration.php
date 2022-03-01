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
 * Class Registration
 *
 * @property int $id
 * @property int $payment_phase_id
 * @property int $student_id
 * @property int $processed_by_id
 * @property int|null $invoice_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $bank_invoice_id
 *
 * @property Medium|null $medium
 * @property PaymentPhase $payment_phase
 * @property Student $student
 * @property User $user
 *
 * @package App\Models
 */
class Registration extends Model implements HasMedia
{
    use InteractsWithMedia;
	protected $table = 'registrations';

	protected $casts = [
		'payment_phase_id' => 'int',
		'student_id' => 'int',
		'processed_by_id' => 'int',
		'invoice_id' => 'int',
		'bank_invoice_id' => 'int',
        'amount' => 'float'
	];

	protected $fillable = [
		'payment_phase_id',
		'student_id',
		'processed_by_id',
		'invoice_id',
		'bank_invoice_id',
        'amount'
	];


	public function payment_phase()
	{
		return $this->belongsTo(PaymentPhase::class);
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
