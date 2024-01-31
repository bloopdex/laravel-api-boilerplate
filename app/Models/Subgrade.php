<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subgrade
 *
 * @property int $subgrade_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $serial_number
 * @property string|null $digitization_serial_number
 * @property string|null $code
 * @property int|null $order_number
 * @property int|null $grade_id
 * @property int|null $school_id
 * @property bool|null $is_archived
 *
 * @property Grade|null $grade
 * @property School|null $school
 * @property Collection|Subject[] $subjects
 * @property Collection|Classes[] $classes
 *
 * @package App\Models
 */
class Subgrade extends Model
{
	protected $table = 'Subgrades';
	protected $primaryKey = 'subgrade_id';
	public $timestamps = false;

	protected $casts = [
		'order_number' => 'int',
		'grade_id' => 'int',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'serial_number',
		'digitization_serial_number',
		'code',
		'order_number',
		'grade_id',
		'school_id',
		'is_archived'
	];

	public function grade()
	{
		return $this->belongsTo(Grade::class, 'grade_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function subjects()
	{
		return $this->belongsToMany(Subject::class, 'Subgrade_Subjects');
	}

	public function classes()
	{
		return $this->hasMany(Classes::class, 'subgrade_id');
	}
}
