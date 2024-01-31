<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalaryType
 * 
 * @property int $salary_type_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property USER-DEFINED|null $salary_type
 * @property USER-DEFINED|null $employee_type
 * @property float|null $amount
 * @property int|null $school_id
 * 
 * @property School|null $school
 * @property Collection|EmployeeSalary[] $employee_salaries
 *
 * @package App\Models
 */
class SalaryType extends Model
{
	protected $table = 'Salary_Types';
	protected $primaryKey = 'salary_type_id';
	public $timestamps = false;

	protected $casts = [
		'salary_type' => 'USER-DEFINED',
		'employee_type' => 'USER-DEFINED',
		'amount' => 'float',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'salary_type',
		'employee_type',
		'amount',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function employee_salaries()
	{
		return $this->hasMany(EmployeeSalary::class, 'salary_type_id');
	}
}
