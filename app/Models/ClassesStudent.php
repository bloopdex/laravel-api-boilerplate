<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassStudent
 *
 * @property int $class_id
 * @property int $student_id
 *
 * @property Classes $class
 * @property Student $student
 *
 * @package App\Models
 */
class ClassesStudent extends Model
{
	protected $table = 'Class_Students';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'class_id' => 'int',
		'student_id' => 'int'
	];

	public function class()
	{
		return $this->belongsTo(Classes::class, 'class_id');
	}

	public function student()
	{
		return $this->belongsTo(Student::class, 'student_id');
	}
}
