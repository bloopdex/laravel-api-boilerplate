<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentTerm
 * 
 * @property int $term_id
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string|null $arabic_title
 * @property string|null $english_name
 * @property string|null $note
 * @property float|null $amount
 * @property int|null $school_id
 * 
 * @property School|null $school
 *
 * @package App\Models
 */
class PaymentTerm extends Model
{
	protected $table = 'Payment_Terms';
	protected $primaryKey = 'term_id';
	public $timestamps = false;

	protected $casts = [
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'amount' => 'float',
		'school_id' => 'int'
	];

	protected $fillable = [
		'start_date',
		'end_date',
		'arabic_title',
		'english_name',
		'note',
		'amount',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
