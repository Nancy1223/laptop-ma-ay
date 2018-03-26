<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TLaptop extends Model
{
	protected $table='tlaptop';
	protected $primaryKey='codigoLaptop';
	protected $keyType='string';
	public $incrementing=false;
	public $timestamps=true;

	public function tprestamo()
	{
		return $this->hasMany('App\Model\TPrestamo', 'codigoLaptop');
	}
}
?>