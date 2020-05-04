<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 * 
 * @property int $id
 * @property string $titre
 * @property string $ville
 * @property string $societe
 * @property Carbon $debut
 * @property Carbon $fin
 * @property string $descriptif
 * @property int $user_id
 *
 * @package App\Models
 */
class Experience extends Model
{
	protected $table = 'experiences';
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
		'ville',
		'societe',
		'debut',
		'fin',
		'descriptif',
		'user_id'
	];
}
