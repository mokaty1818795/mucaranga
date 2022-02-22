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
 * @property float|null $price
 *
 * @property Collection|Registration[] $registrations
 *
 * @package App\Models
 */
class PaymentPhase extends Model
{
	protected $table = 'payment_phases';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
	];

	public function registrations()
	{
		return $this->hasMany(Registration::class);
	}
}
