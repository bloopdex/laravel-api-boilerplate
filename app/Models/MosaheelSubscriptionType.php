<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MosaheelSubscriptionType
 * 
 * @property int $subscription_type_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property float|null $amount
 * 
 * @property Collection|MosaheelSubscription[] $mosaheel_subscriptions
 *
 * @package App\Models
 */
class MosaheelSubscriptionType extends Model
{
	protected $table = 'Mosaheel_Subscription_Types';
	protected $primaryKey = 'subscription_type_id';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'amount'
	];

	public function mosaheel_subscriptions()
	{
		return $this->hasMany(MosaheelSubscription::class, 'subscription_type_id');
	}
}
