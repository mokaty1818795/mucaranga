<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassRoom
 * 
 * @property int $id
 * @property string|null $name
 * @property int $instructor
 * @property int $period_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Period $period
 * @property User $user
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class ClassRoom extends Model
{
	protected $table = 'class_rooms';

	protected $casts = [
		'instructor' => 'int',
		'period_id' => 'int'
	];

	protected $fillable = [
		'name',
		'instructor',
		'period_id'
	];

	public function period()
	{
		return $this->belongsTo(Period::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'instructor');
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'class_room_students', 'class_rooms_id', 'students_id')
					->withPivot('id')
					->withTimestamps();
	}
}
