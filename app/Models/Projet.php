<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Projet
 * 
 * @property int $id
 * @property string $titre
 * @property string $url
 * @property string $image
 * @property int $ordre
 * @property int $user_id
 *
 * @package App\Models
 */
class Projet extends Model
{
	protected $table = 'projets';
	public $timestamps = false;

	protected $casts = [
		'ordre' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'titre',
		'url',
		'image',
		'ordre',
		'user_id'
	];
}
