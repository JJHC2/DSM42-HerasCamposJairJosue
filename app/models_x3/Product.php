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
 * Class Product
 * 
 * @property int $id
 * @property string $color
 * @property float $price
 * @property string $name_p
 * @property string $description
 * @property string $status
 * @property float $size
 * @property int $existence
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Category[] $categories
 * @property Collection|Inventory[] $inventories
 *
 * @package App\Models
 */
class Product extends Model
{
	use SoftDeletes;
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
		'existence'
	];

	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function inventories()
	{
		return $this->hasMany(Inventory::class);
	}
}
