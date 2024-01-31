<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModulePermission
 * 
 * @property int $module_id
 * @property int $permission_id
 * 
 * @property Module $module
 * @property Permission $permission
 *
 * @package App\Models
 */
class ModulePermission extends Model
{
	protected $table = 'Module_Permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'module_id' => 'int',
		'permission_id' => 'int'
	];

	public function module()
	{
		return $this->belongsTo(Module::class, 'module_id');
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'permission_id');
	}
}
