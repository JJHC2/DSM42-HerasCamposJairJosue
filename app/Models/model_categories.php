<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class model_categories extends Model
{
    use HasFactory,SoftDeletes;
	protected $table = 'model_categories';

	protected $casts = [
		'categories_id' => 'int'
	];

	protected $fillable = [
		'description',
		'categories_id'
	];
	public function category()
	{
		return $this->belongsTo(categories::class, 'categories_id');
	}
}
