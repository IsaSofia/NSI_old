<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bloco
 * 
 * @property int $id
 * @property string $descricao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $denuncia
 *
 * @package App\Models
 */
class Bloco extends Eloquent
{
	protected $table = 'bloco';
	public $timestamps = false;

	protected $fillable = [
		'descricao'
	];

	public function denuncia()
	{
		return $this->hasMany(\App\Models\Denuncium::class, 'id_bloco');
	}
}
