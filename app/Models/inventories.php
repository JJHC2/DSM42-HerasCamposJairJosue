<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class inventories extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'inventories';

	protected $casts = [
		'product_id' => 'int',
		'usuario_id' => 'int'
	];

	protected $fillable = [
		'status',
		'product_id',
		'usuario_id'
	];


	public function product()
	{
		return $this->belongsTo(products::class);
	}

	public function usuario()
	{
		return $this->belongsTo(usuarios::class);
	}

	public function details()
	{
		return $this->hasMany(details::class);
	}
}
