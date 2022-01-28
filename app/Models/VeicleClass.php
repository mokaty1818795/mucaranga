<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VeicleClass
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
class VeicleClass extends Model
{
	protected $table = 'veicle_classes';

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->hasMany(Student::class, 'veicle_classe_id');
	}
}
