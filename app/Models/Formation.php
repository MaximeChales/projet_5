<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formation
 * 
 * @property int $id
 * @property string $titre
 * @property string $societe
 * @property Carbon $debut
 * @property Carbon $fin
 * @property string $descriptif
 * @property int $user_id
 *
 * @package App\Models
 */
class Formation extends Model
{
	protected $table = 'formations';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'debut',
		'fin'
	];

	protected $fillable = [
		'titre',
		'societe',
		'debut',
		'fin',
		'descriptif',
		'user_id'
	];
}
