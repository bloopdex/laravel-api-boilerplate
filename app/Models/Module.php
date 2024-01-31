<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 * 
 * @property int $module_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $note
 * 
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class Module extends Model
{
	protected $table = 'Modules';
	protected $primaryKey = 'module_id';
	public $timestamps = false;

	protected $fillable = [
		'arabic_name',
		'english_name',
		'note'
	];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'Module_Permissions');
	}
}
