<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property \Carbon\Carbon $data
 * @property string $nome
 * @property string $sobrenome
 * @property string $feedback_descricao
 * @property string $imagem
 *
 * @package App\Models
 */
class Feedback extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'data'
	];

	protected $fillable = [
		'data',
		'nome',
		'sobrenome',
		'feedback_descricao',
		'imagem'
	];
}
