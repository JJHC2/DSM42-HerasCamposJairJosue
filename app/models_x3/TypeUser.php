<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TypeUser
 * 
 * @property int $id
 * @property string $type
 * @property int $users_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class TypeUser extends Model
{
	use SoftDeletes;
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
		return $this->belongsTo(Usuario::class, 'users_id');
	}
}
