<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class type_user extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'type_users';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'type',
		'users_id'
	];

	public function usuario()
	{
		return $this->belongsTo(usuarios::class, 'users_id');
	}
}
