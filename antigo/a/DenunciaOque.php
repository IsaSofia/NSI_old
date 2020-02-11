<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 14 Dec 2018 20:09:26 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DenunciaOque
 * 
 * @property int $id
 * @property string $descricao
 * 
 * @property \Illuminate\Database\Eloquent\Collection $denuncia
 *
 * @package App\Models
 */
class DenunciaOque extends Eloquent
{
	protected $table = 'denuncia_oque';
	public $timestamps = false;

	protected $fillable = [
		'descricao'
	];

	public function denuncia()
	{
		return $this->hasMany(\App\Models\Denuncium::class, 'id_denuncia_oque');
	}
}
