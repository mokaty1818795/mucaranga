<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentPhase
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|StudentPayment[] $student_payments
 *
 * @package App\Models
 */
class PaymentPhase extends Model
{
	protected $table = 'payment_phases';

	protected $fillable = [
		'name'
	];

	public function student_payments()
	{
		return $this->hasMany(StudentPayment::class, 'payment_phases_id');
	}
}
