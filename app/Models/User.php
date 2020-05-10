<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $password
 * @property string $nom
 * @property string $prenom
 * @property Carbon $date_de_naissance
 * @property string $job
 * @property string $adresse
 * @property int $code_postal
 * @property string $ville
 * @property string $telephone
 * @property bool $permis_b
 * @property string $accroche
 * @property string $email
 * @property string $photo_profil
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'code_postal' => 'int',
		'permis_b' => 'text'
	];

	protected $dates = [
		'date_de_naissance'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'nom',
		'prenom',
		'date_de_naissance',
		'job',
		'adresse',
		'code_postal',
		'ville',
		'telephone',
		'permis_b',
		'accroche',
		'email',
		'photo_profil'
	];
}
