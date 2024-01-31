<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $permission_id
 * @property string $permission_name
 * @property int|null $group_id
 * @property int|null $action_id
 * @property string|null $description
 * 
 * @property PermissionGroup|null $permission_group
 * @property PermissionAction|null $permission_action
 * @property Collection|Module[] $modules
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'Permissions';
	protected $primaryKey = 'permission_id';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int',
		'action_id' => 'int'
	];

	protected $fillable = [
		'permission_name',
		'group_id',
		'action_id',
		'description'
	];

	public function permission_group()
	{
		return $this->belongsTo(PermissionGroup::class, 'group_id');
	}

	public function permission_action()
	{
		return $this->belongsTo(PermissionAction::class, 'action_id');
	}

	public function modules()
	{
		return $this->belongsToMany(Module::class, 'Module_Permissions');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'Role_Permissions');
	}
}
