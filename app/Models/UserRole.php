<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRole
 * 
 * @property int $user_id
 * @property int $role_id
 * 
 * @property User $user
 * @property Role $role
 *
 * @package App\Models
 */
class UserRole extends Model
{
	protected $table = 'User_Roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'role_id');
	}
}
