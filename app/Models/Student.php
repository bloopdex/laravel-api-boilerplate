<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property int $student_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $parent_id
 * @property int|null $school_id
 * @property bool|null $is_archived
 *
 * @property Parents|null $parent
 * @property School|null $school
 * @property Collection|SchoolSubscription[] $school_subscriptions
 * @property Collection|Classes[] $classes
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'Students';
	protected $primaryKey = 'student_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'parent_id',
		'school_id',
		'is_archived'
	];

	public function parent()
	{
		return $this->belongsTo(Parent::class, 'parent_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function school_subscriptions()
	{
		return $this->hasMany(SchoolSubscription::class, 'student_id');
	}

	public function classes()
	{
		return $this->belongsToMany(Classes::class, 'Class_Students');
	}
}
