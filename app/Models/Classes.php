<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classes
 *
 * @property int $class_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $serial_number
 * @property string|null $digitization_serial_number
 * @property int|null $room_id
 * @property int|null $subgrade_id
 * @property int|null $school_id
 *
 * @property Room|null $room
 * @property Subgrade|null $subgrade
 * @property School|null $school
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Classes extends Model
{
	protected $table = 'Classes';
	protected $primaryKey = 'class_id';
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'subgrade_id' => 'int',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'serial_number',
		'digitization_serial_number',
		'room_id',
		'subgrade_id',
		'school_id'
	];

	public function room()
	{
		return $this->belongsTo(Room::class, 'room_id');
	}

	public function subgrade()
	{
		return $this->belongsTo(Subgrade::class, 'subgrade_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function students()
	{
		return $this->belongsToMany(Student::class, 'Class_Students');
	}
}
