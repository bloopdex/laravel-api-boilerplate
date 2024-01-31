<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Revenue
 * 
 * @property int $revenue_id
 * @property string|null $arabic_reason
 * @property string|null $english_reason
 * @property float|null $amount
 * @property string|null $arabic_donor
 * @property string|null $english_donor
 * @property USER-DEFINED|null $transfer_type
 * @property Carbon|null $revenue_date
 * @property int|null $school_id
 * 
 * @property School|null $school
 *
 * @package App\Models
 */
class Revenue extends Model
{
	protected $table = 'Revenues';
	protected $primaryKey = 'revenue_id';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'transfer_type' => 'USER-DEFINED',
		'revenue_date' => 'datetime',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_reason',
		'english_reason',
		'amount',
		'arabic_donor',
		'english_donor',
		'transfer_type',
		'revenue_date',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
