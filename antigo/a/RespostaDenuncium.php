<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RespostaDenuncium
 * 
 * @property int $id
 * @property \Carbon\Carbon $data
 * @property string $descricao_resposta
 * @property string $imagem
 * @property int $id_usuario
 * 
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class RespostaDenuncium extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $dates = [
		'data'
	];

	protected $fillable = [
		'data',
		'descricao_resposta',
		'imagem',
		'id_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario');
	}
}
