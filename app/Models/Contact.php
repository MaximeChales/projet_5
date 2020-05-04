<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $logo
 * @property string $url
 * @property int $ordre
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'ordre' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'logo',
		'url',
		'ordre'
	];
}
