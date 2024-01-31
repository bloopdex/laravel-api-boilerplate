<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AcademicYear
 * 
 * @property int $academic_year_id
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string|null $note
 * @property int|null $school_id
 * @property bool|null $is_active
 * @property bool|null $is_archived
 * 
 * @property School|null $school
 *
 * @package App\Models
 */
class AcademicYear extends Model
{
	protected $table = 'Academic_Years';
	protected $primaryKey = 'academic_year_id';
	public $timestamps = false;

	protected $casts = [
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'school_id' => 'int',
		'is_active' => 'bool',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'start_date',
		'end_date',
		'note',
		'school_id',
		'is_active',
		'is_archived'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
