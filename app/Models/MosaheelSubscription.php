<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MosaheelSubscription
 * 
 * @property int $subscription_id
 * @property int|null $school_id
 * @property int|null $subscription_type_id
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * 
 * @property School|null $school
 * @property MosaheelSubscriptionType|null $mosaheel_subscription_type
 *
 * @package App\Models
 */
class MosaheelSubscription extends Model
{
	protected $table = 'Mosaheel_Subscriptions';
	protected $primaryKey = 'subscription_id';
	public $timestamps = false;

	protected $casts = [
		'school_id' => 'int',
		'subscription_type_id' => 'int',
		'start_date' => 'datetime',
		'end_date' => 'datetime'
	];

	protected $fillable = [
		'school_id',
		'subscription_type_id',
		'start_date',
		'end_date'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function mosaheel_subscription_type()
	{
		return $this->belongsTo(MosaheelSubscriptionType::class, 'subscription_type_id');
	}
}
