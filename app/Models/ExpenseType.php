<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseType
 * 
 * @property int $expense_type_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $note
 * @property int|null $school_id
 * 
 * @property School|null $school
 * @property Collection|Expense[] $expenses
 *
 * @package App\Models
 */
class ExpenseType extends Model
{
	protected $table = 'Expense_Types';
	protected $primaryKey = 'expense_type_id';
	public $timestamps = false;

	protected $casts = [
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'note',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function expenses()
	{
		return $this->hasMany(Expense::class, 'expense_type_id');
	}
}
