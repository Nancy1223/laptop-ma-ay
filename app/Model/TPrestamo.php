<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TPrestamo extends Model
{
	protected $table='tprestamo';
	protected $primaryKey='codigoPrestamo';
	public $incrementing=false;
	public $timestamps=false;
	protected $keyType='string';

	public function tusuario()
	{
		return $this->belongsTo('App\Model\TUsuario', 'codigoUsuario');
	}

	public function tlaptop()
	{
		return $this->belongsTo('App\Model\TLaptop', 'codigoLaptop');
	}
}