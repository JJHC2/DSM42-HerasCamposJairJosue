<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory,softDeletes;
	protected $table = 'products';

	protected $casts = [
		'price' => 'float',
		'size' => 'float',
		'existence' => 'int'
	];
	protected $fillable = [
		'color',
		'price',
		'name_p',
		'description',
		'status',
		'size',
		'existence',
	];

	public function categories()
	{
		return $this->hasMany(categories::class);
	}

	public function inventories()
	{
		return $this->hasMany(inventories::class);
	}
}
