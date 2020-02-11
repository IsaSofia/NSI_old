<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nome
 * @property string $sobrenome
 * @property string $matricula
 * @property string $email
 * @property string $senha
 * @property int $aluno
 * @property int $moderador
 * @property int $tec_adm
 * 
 * @property \Illuminate\Database\Eloquent\Collection $denuncia
 * @property \Illuminate\Database\Eloquent\Collection $resposta_denuncia
 *
 * @package App\Models
 */
class Usuario extends Eloquent
{
	protected $table = 'usuario';
	public $timestamps = false;

	protected $casts = [
		'aluno' => 'int',
		'moderador' => 'int',
		'tec_adm' => 'int'
	];

	protected $fillable = [
		'nome',
		'sobrenome',
		'matricula',
		'email',
		'senha',
		'aluno',
		'moderador',
		'tec_adm'
	];

	public function denuncia()
	{
		return $this->hasMany(\App\Models\Denuncium::class, 'id_usuario');
	}

	public function resposta_denuncia()
	{
		return $this->hasMany(\App\Models\RespostaDenuncium::class, 'id_usuario');
	}
}
