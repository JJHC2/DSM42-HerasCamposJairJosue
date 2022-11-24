<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class categories extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'categories';

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'description',
		'name_category',
		'product_id'
	];

	public function product()
	{
		return $this->belongsTo(products::class);
	}

	public function model_categories()
	{
		return $this->hasMany(model_categories::class, 'categories_id');
	}
}


