<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolSubscriptionType
 * 
 * @property int $subscription_type_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property float|null $amount
 * @property int|null $school_id
 * 
 * @property School|null $school
 * @property Collection|SchoolSubscription[] $school_subscriptions
 *
 * @package App\Models
 */
class SchoolSubscriptionType extends Model
{
	protected $table = 'School_Subscription_Types';
	protected $primaryKey = 'subscription_type_id';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'amount',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function school_subscriptions()
	{
		return $this->hasMany(SchoolSubscription::class, 'subscription_type_id');
	}
}
