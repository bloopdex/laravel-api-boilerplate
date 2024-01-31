<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionGroup
 * 
 * @property int $group_id
 * @property string $group_name
 * @property string|null $description
 * 
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class PermissionGroup extends Model
{
	protected $table = 'Permission_Groups';
	protected $primaryKey = 'group_id';
	public $timestamps = false;

	protected $fillable = [
		'group_name',
		'description'
	];

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'group_id');
	}
}
