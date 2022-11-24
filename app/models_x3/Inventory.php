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
 * Class Inventory
 * 
 * @property int $id
 * @property string $status
 * @property int $product_id
 * @property int $usuario_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property Usuario $usuario
 * @property Collection|Detail[] $details
 *
 * @package App\Models
 */
class Inventory extends Model
{
	use SoftDeletes;
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
		return $this->belongsTo(Product::class);
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class);
	}

	public function details()
	{
		return $this->hasMany(Detail::class);
	}
}
