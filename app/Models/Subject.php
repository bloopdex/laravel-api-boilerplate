<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject
 * 
 * @property int $subject_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $icon
 * @property bool|null $is_archived
 * @property int|null $school_id
 * 
 * @property School|null $school
 * @property Collection|Group[] $groups
 * @property Collection|Subgrade[] $subgrades
 *
 * @package App\Models
 */
class Subject extends Model
{
	protected $table = 'Subjects';
	protected $primaryKey = 'subject_id';
	public $timestamps = false;

	protected $casts = [
		'is_archived' => 'bool',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'icon',
		'is_archived',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function groups()
	{
		return $this->belongsToMany(Group::class, 'Group_Subjects');
	}

	public function subgrades()
	{
		return $this->belongsToMany(Subgrade::class, 'Subgrade_Subjects');
	}
}
