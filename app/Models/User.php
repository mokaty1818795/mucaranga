<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $contact
 * @property bool|null $active
 * @property bool|null $genre
 * @property Collection|ClassRoom[] $class_rooms
 * @property Collection|StudentPayment[] $student_payments
 *
 * @package App\Models
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissions,HasRoles,InteractsWithMedia;
	protected $table = 'users';

	protected $casts = [
		'active' => 'bool',
		'genre' => 'bool'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'contact',
		'active',
		'genre',
	];

	public function class_rooms()
	{
		return $this->hasMany(ClassRoom::class, 'instructor');
	}

	public function student_payments()
	{
		return $this->hasMany(StudentPayment::class, 'created_by_id');
	}
}
