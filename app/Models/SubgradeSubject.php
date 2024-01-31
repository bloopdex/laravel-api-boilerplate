<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubgradeSubject
 * 
 * @property int $subject_id
 * @property int $subgrade_id
 * 
 * @property Subject $subject
 * @property Subgrade $subgrade
 *
 * @package App\Models
 */
class SubgradeSubject extends Model
{
	protected $table = 'Subgrade_Subjects';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'subject_id' => 'int',
		'subgrade_id' => 'int'
	];

	public function subject()
	{
		return $this->belongsTo(Subject::class, 'subject_id');
	}

	public function subgrade()
	{
		return $this->belongsTo(Subgrade::class, 'subgrade_id');
	}
}
