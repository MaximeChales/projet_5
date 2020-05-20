<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CentresInteret
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $logo
 * @property int $ordre
 *
 * @package App\Models
 */
class CentresInteret extends Model
{
	protected $table = 'centres_interets';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'ordre' => 'int'
	];

	protected $fillable = [
		'user_id',
		'description_ci',
		'logo_ci',
		'ordre'
	];
}
