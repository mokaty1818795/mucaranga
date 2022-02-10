<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon $birth_day
 * @property int $civil_state_id
 * @property string|null $natural_of
 * @property string|null $natural_location
 * @property string|null $natural_district
 * @property string|null $natural_province
 * @property string|null $father_name
 * @property string|null $mother_name
 * @property string|null $place_location
 * @property string|null $place_district
 * @property string|null $place_province
 * @property string|null $place_zone
 * @property string|null $id_identity
 * @property Carbon|null $id_emision_date
 * @property string|null $id_emited_with
 * @property Carbon|null $admited_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $veicle_classe_id
 * @property string|null $student_code
 * @property float|null $test_1
 * @property float|null $test_2
 * @property float|null $test_3
 * @property float|null $test_4
 * @property int|null $teoric_lessons
 * @property int|null $pratice_lessons
 * @property int|null $tecnic_lessons
 * @property float|null $result
 * @property bool|null $genre
 * 
 * @property CivilState $civil_state
 * @property VeicleClass $veicle_class
 * @property Collection|ClassRoom[] $class_rooms
 * @property Collection|StudentPayment[] $student_payments
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'students';

	protected $casts = [
		'civil_state_id' => 'int',
		'veicle_classe_id' => 'int',
		'test_1' => 'float',
		'test_2' => 'float',
		'test_3' => 'float',
		'test_4' => 'float',
		'teoric_lessons' => 'int',
		'pratice_lessons' => 'int',
		'tecnic_lessons' => 'int',
		'result' => 'float',
		'genre' => 'bool'
	];

	protected $dates = [
		'birth_day',
		'id_emision_date',
		'admited_at'
	];

	protected $fillable = [
		'name',
		'birth_day',
		'civil_state_id',
		'natural_of',
		'natural_location',
		'natural_district',
		'natural_province',
		'father_name',
		'mother_name',
		'place_location',
		'place_district',
		'place_province',
		'place_zone',
		'id_identity',
		'id_emision_date',
		'id_emited_with',
		'admited_at',
		'veicle_classe_id',
		'student_code',
		'test_1',
		'test_2',
		'test_3',
		'test_4',
		'teoric_lessons',
		'pratice_lessons',
		'tecnic_lessons',
		'result',
		'genre'
	];

	public function civil_state()
	{
		return $this->belongsTo(CivilState::class);
	}

	public function veicle_class()
	{
		return $this->belongsTo(VeicleClass::class, 'veicle_classe_id');
	}

	public function class_rooms()
	{
		return $this->belongsToMany(ClassRoom::class, 'class_room_students', 'students_id', 'class_rooms_id')
					->withPivot('id')
					->withTimestamps();
	}

	public function student_payments()
	{
		return $this->hasMany(StudentPayment::class, 'students_id');
	}
}
