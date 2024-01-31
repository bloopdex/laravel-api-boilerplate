<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionAction
 * 
 * @property int $action_id
 * @property string $action_name
 * @property string|null $description
 * 
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class PermissionAction extends Model
{
	protected $table = 'Permission_Actions';
	protected $primaryKey = 'action_id';
	public $timestamps = false;

	protected $fillable = [
		'action_name',
		'description'
	];

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'action_id');
	}
}
