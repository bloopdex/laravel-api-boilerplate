<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 *
 * @property int $room_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $serial_number
 * @property string|null $digitization_serial_number
 * @property int|null $capacity
 * @property string|null $arabic_note
 * @property string|null $english_note
 * @property int|null $school_id
 *
 * @property School|null $school
 * @property Collection|Classes[] $classes
 *
 * @package App\Models
 */
class Room extends Model
{
	protected $table = 'Rooms';
	protected $primaryKey = 'room_id';
	public $timestamps = false;

	protected $casts = [
		'capacity' => 'int',
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'serial_number',
		'digitization_serial_number',
		'capacity',
		'arabic_note',
		'english_note',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function classes()
	{
		return $this->hasMany(Classes::class, 'room_id');
	}
}
