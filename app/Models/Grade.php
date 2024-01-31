<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grade
 * 
 * @property int $grade_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property bool|null $is_archived
 * @property int|null $school_id
 * 
 * @property School|null $school
 * @property Collection|Subgrade[] $subgrades
 * @property Collection|Group[] $groups
 *
 * @package App\Models
 */
class Grade extends Model
{
	protected $table = 'Grades';
	protected $primaryKey = 'grade_id';
	public $timestamps = false;

	protected $casts = [
		'is_archived' => 'bool',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'is_archived',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function subgrades()
	{
		return $this->hasMany(Subgrade::class, 'grade_id');
	}

	public function groups()
	{
		return $this->hasMany(Group::class, 'grade_id');
	}
}
