<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parent
 *
 * @property int $parent_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $school_id
 * @property bool|null $is_archived
 *
 * @property School|null $school
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Parents extends Model
{
	protected $table = 'Parents';
	protected $primaryKey = 'parent_id';
	public $timestamps = false;

	protected $casts = [
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'school_id',
		'is_archived'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'parent_id');
	}
}
