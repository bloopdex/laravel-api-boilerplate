<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeSalary
 * 
 * @property int $salary_id
 * @property int|null $employee_id
 * @property int|null $salary_type_id
 * @property float|null $amount
 * @property Carbon|null $payment_date
 * @property int|null $school_id
 * @property bool|null $is_archived
 * 
 * @property Employee|null $employee
 * @property SalaryType|null $salary_type
 * @property School|null $school
 *
 * @package App\Models
 */
class EmployeeSalary extends Model
{
	protected $table = 'Employee_Salaries';
	protected $primaryKey = 'salary_id';
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'salary_type_id' => 'int',
		'amount' => 'float',
		'payment_date' => 'datetime',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'employee_id',
		'salary_type_id',
		'amount',
		'payment_date',
		'school_id',
		'is_archived'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_id');
	}

	public function salary_type()
	{
		return $this->belongsTo(SalaryType::class, 'salary_type_id');
	}

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}
}
