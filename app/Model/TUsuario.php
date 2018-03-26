<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TUsuario extends Model
{
	protected $table='tusuario';
	protected $primaryKey='codigoUsuario';
	protected $keyType='string';
	public $incrementing=false;
	public $timestamps=true;

	public function tprestamo()
	{
		return $this->hasMany('App\Model\TPrestamo', 'codigoUsuario');
	}
	 
}
?>