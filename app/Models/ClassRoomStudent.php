<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassRoomStudent
 * 
 * @property int $class_rooms_id
 * @property int $students_id
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ClassRoom $class_room
 * @property Student $student
 *
 * @package App\Models
 */
class ClassRoomStudent extends Model
{
	protected $table = 'class_room_students';

	protected $casts = [
		'class_rooms_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'class_rooms_id',
		'students_id'
	];

	public function class_room()
	{
		return $this->belongsTo(ClassRoom::class, 'class_rooms_id');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'students_id');
	}
}
