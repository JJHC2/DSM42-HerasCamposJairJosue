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
 * Class Category
 * 
 * @property int $id
 * @property string $name_category
 * @property int $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Product $product
 * @property Collection|ModelCategory[] $model_categories
 *
 * @package App\Models
 */
class Category extends Model
{
	use SoftDeletes;
	protected $table = 'categories';

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'name_category',
		'product_id'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function model_categories()
	{
		return $this->hasMany(ModelCategory::class, 'categories_id');
	}
}
