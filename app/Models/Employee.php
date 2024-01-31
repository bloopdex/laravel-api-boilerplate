<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $employee_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property USER-DEFINED|null $employee_type
 * @property int|null $school_id
 * @property bool|null $is_archived
 * 
 * @property School|null $school
 * @property Collection|EmployeeSalary[] $employee_salaries
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'Employees';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'employee_type' => 'USER-DEFINED',
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'phone',
		'employee_type',
		'school_id',
		'is_archived'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function employee_salaries()
	{
		return $this->hasMany(EmployeeSalary::class, 'employee_id');
	}
}
