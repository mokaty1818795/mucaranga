<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CivilState
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class CivilState extends Model
{
	protected $table = 'civil_states';

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->hasMany(Student::class);
	}
}
