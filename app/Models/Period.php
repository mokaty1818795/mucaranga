<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Period
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $init_at
 * @property Carbon|null $end_at
 * 
 * @property Collection|ClassRoom[] $class_rooms
 *
 * @package App\Models
 */
class Period extends Model
{
	protected $table = 'periods';

	protected $dates = [
		'init_at',
		'end_at'
	];

	protected $fillable = [
		'name',
		'init_at',
		'end_at'
	];

	public function class_rooms()
	{
		return $this->hasMany(ClassRoom::class);
	}
}
