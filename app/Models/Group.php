<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * 
 * @property int $group_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $serial_number
 * @property string|null $digitization_serial_number
 * @property string|null $group_code
 * @property int|null $grade_id
 * @property int|null $school_id
 * @property bool|null $is_archived
 * 
 * @property Grade|null $grade
 * @property School|null $school
 * @property Collection|Subject[] $subjects
 *
 * @package App\Models
 */
class Group extends Model
{
	protected $table = 'Groups';
	protected $primaryKey = 'group_id';
	public $timestamps = false;

	protected $casts = [
		'grade_id' => 'int',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'serial_number',
		'digitization_serial_number',
		'group_code',
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
		return $this->belongsToMany(Subject::class, 'Group_Subjects');
	}
}
