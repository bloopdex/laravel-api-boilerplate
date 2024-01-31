<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Expense
 * 
 * @property int $expense_id
 * @property int|null $expense_type_id
 * @property string|null $arabic_reason
 * @property string|null $english_reason
 * @property float|null $amount
 * @property Carbon|null $expense_date
 * @property USER-DEFINED|null $transfer_type
 * @property int|null $school_id
 * 
 * @property ExpenseType|null $expense_type
 * @property School|null $school
 *
 * @package App\Models
 */
class Expense extends Model
{
	protected $table = 'Expenses';
	protected $primaryKey = 'expense_id';
	public $timestamps = false;

	protected $casts = [
		'expense_type_id' => 'int',
		'amount' => 'float',
		'expense_date' => 'datetime',
		'transfer_type' => 'USER-DEFINED',
		'school_id' => 'int'
	];

	protected $fillable = [
		'expense_type_id',
		'arabic_reason',
		'english_reason',
		'amount',
		'expense_date',
		'transfer_type',
		'school_id'
	];

	public function expense_type()
	{
		return $this->belongsTo(ExpenseType::class, 'expense_type_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
