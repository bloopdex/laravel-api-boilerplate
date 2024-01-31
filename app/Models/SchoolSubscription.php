<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SchoolSubscription
 * 
 * @property int $subscription_id
 * @property int|null $student_id
 * @property int|null $subscription_type_id
 * @property float|null $amount_to_pay
 * @property float|null $amount_paid
 * @property Carbon|null $payment_date
 * @property int|null $school_id
 * @property bool|null $is_archived
 * 
 * @property Student|null $student
 * @property SchoolSubscriptionType|null $school_subscription_type
 * @property School|null $school
 *
 * @package App\Models
 */
class SchoolSubscription extends Model
{
	protected $table = 'School_Subscriptions';
	protected $primaryKey = 'subscription_id';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'subscription_type_id' => 'int',
		'amount_to_pay' => 'float',
		'amount_paid' => 'float',
		'payment_date' => 'datetime',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'student_id',
		'subscription_type_id',
		'amount_to_pay',
		'amount_paid',
		'payment_date',
		'school_id',
		'is_archived'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'student_id');
	}

	public function school_subscription_type()
	{
		return $this->belongsTo(SchoolSubscriptionType::class, 'subscription_type_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
