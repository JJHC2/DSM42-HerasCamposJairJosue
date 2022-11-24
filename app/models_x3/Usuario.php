<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $name
 * @property int $phone_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Inventory[] $inventories
 * @property Collection|TypeUser[] $type_users
 *
 * @package App\Models
 */
class Usuario extends Model
{
	use SoftDeletes;
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
		return $this->hasMany(Inventory::class);
	}

	public function type_users()
	{
		return $this->hasMany(TypeUser::class, 'users_id');
	}
}
