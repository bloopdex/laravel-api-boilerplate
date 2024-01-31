<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @property int $school_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $arabic_address
 * @property string|null $english_address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $date_type
 * @property string|null $currency
 * @property string|null $logo
 * @property string|null $stamp
 * @property int|null $default_language_id
 *
 * @property Language|null $language
 * @property Collection|Room[] $rooms
 * @property Collection|Classes[] $classes
 * @property Collection|User[] $users
 * @property Collection|MosaheelSubscription[] $mosaheel_subscriptions
 * @property Collection|Role[] $roles
 * @property Collection|ExpenseType[] $expense_types
 * @property Collection|Expense[] $expenses
 * @property Collection|Revenue[] $revenues
 * @property Collection|PaymentTerm[] $payment_terms
 * @property Collection|SalaryType[] $salary_types
 * @property Collection|Employee[] $employees
 * @property Collection|EmployeeSalary[] $employee_salaries
 * @property Collection|SchoolSubscription[] $school_subscriptions
 * @property Collection|SchoolSubscriptionType[] $school_subscription_types
 * @property Collection|AcademicYear[] $academic_years
 * @property Collection|Parents[] $parents
 * @property Collection|Student[] $students
 * @property Collection|Grade[] $grades
 * @property Collection|Subject[] $subjects
 * @property Collection|Subgrade[] $subgrades
 * @property Collection|Group[] $groups
 *
 * @package App\Models
 */
class School extends Model
{
	protected $table = 'Schools';
	protected $primaryKey = 'school_id';
	public $timestamps = false;

	protected $casts = [
		'default_language_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'arabic_address',
		'english_address',
		'phone',
		'email',
		'date_type',
		'currency',
		'logo',
		'stamp',
		'default_language_id'
	];

	public function language()
	{
		return $this->belongsTo(Language::class, 'default_language_id');
	}

	public function rooms()
	{
		return $this->hasMany(Room::class, 'school_id');
	}

	public function classes()
	{
		return $this->hasMany(Classes::class, 'school_id');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'school_id');
	}

	public function mosaheel_subscriptions()
	{
		return $this->hasMany(MosaheelSubscription::class, 'school_id');
	}

	public function roles()
	{
		return $this->hasMany(Role::class, 'school_id');
	}

	public function expense_types()
	{
		return $this->hasMany(ExpenseType::class, 'school_id');
	}

	public function expenses()
	{
		return $this->hasMany(Expense::class, 'school_id');
	}

	public function revenues()
	{
		return $this->hasMany(Revenue::class, 'school_id');
	}

	public function payment_terms()
	{
		return $this->hasMany(PaymentTerm::class, 'school_id');
	}

	public function salary_types()
	{
		return $this->hasMany(SalaryType::class, 'school_id');
	}

	public function employees()
	{
		return $this->hasMany(Employee::class, 'school_id');
	}

	public function employee_salaries()
	{
		return $this->hasMany(EmployeeSalary::class, 'school_id');
	}

	public function school_subscriptions()
	{
		return $this->hasMany(SchoolSubscription::class, 'school_id');
	}

	public function school_subscription_types()
	{
		return $this->hasMany(SchoolSubscriptionType::class, 'school_id');
	}

	public function academic_years()
	{
		return $this->hasMany(AcademicYear::class, 'school_id');
	}

	public function parents()
	{
		return $this->hasMany(Parents::class, 'school_id');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'school_id');
	}

	public function grades()
	{
		return $this->hasMany(Grade::class, 'school_id');
	}

	public function subjects()
	{
		return $this->hasMany(Subject::class, 'school_id');
	}

	public function subgrades()
	{
		return $this->hasMany(Subgrade::class, 'school_id');
	}

	public function groups()
	{
		return $this->hasMany(Group::class, 'school_id');
	}
}
