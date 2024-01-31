<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $language_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * 
 * @property Collection|School[] $schools
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'Languages';
	protected $primaryKey = 'language_id';
	public $timestamps = false;

	protected $fillable = [
		'arabic_name',
		'english_name'
	];

	public function schools()
	{
		return $this->hasMany(School::class, 'default_language_id');
	}
}
