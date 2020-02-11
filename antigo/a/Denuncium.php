<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Denuncium
 * 
 * @property int $id
 * @property \Carbon\Carbon $data
 * @property string $descricao
 * @property int $id_usuario
 * @property string $imagem
 * @property string $qual_descricao
 * @property int $id_bloco
 * @property int $id_denuncia_oque
 * 
 * @property \App\Models\Bloco $bloco
 * @property \App\Models\DenunciaOque $denuncia_oque
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class Denuncium extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int',
		'id_bloco' => 'int',
		'id_denuncia_oque' => 'int'
	];

	protected $dates = [
		'data'
	];

	protected $fillable = [
		'data',
		'descricao',
		'id_usuario',
		'imagem',
		'qual_descricao',
		'id_bloco',
		'id_denuncia_oque'
	];

	public function bloco()
	{
		return $this->belongsTo(\App\Models\Bloco::class, 'id_bloco');
	}

	public function denuncia_oque()
	{
		return $this->belongsTo(\App\Models\DenunciaOque::class, 'id_denuncia_oque');
	}

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'id_usuario');
	}
}
