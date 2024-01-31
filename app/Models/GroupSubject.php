<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupSubject
 * 
 * @property int $subject_id
 * @property int $group_id
 * 
 * @property Subject $subject
 * @property Group $group
 *
 * @package App\Models
 */
class GroupSubject extends Model
{
	protected $table = 'Group_Subjects';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'subject_id' => 'int',
		'group_id' => 'int'
	];

	public function subject()
	{
		return $this->belongsTo(Subject::class, 'subject_id');
	}

	public function group()
	{
		return $this->belongsTo(Group::class, 'group_id');
	}
}
