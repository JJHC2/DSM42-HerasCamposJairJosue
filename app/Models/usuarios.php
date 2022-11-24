<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuarios extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'usuarios';

	protected $casts = [
		'phone_number' => 'int'
	];

	protected $fillable = [
		'name',
		'phone_number'
	];

	public function inventories()
	{
		return $this->hasMany(inventories::class);
	}

	public function type_users()
	{
		return $this->hasMany(type_user::class, 'users_id');
	}
    
}
