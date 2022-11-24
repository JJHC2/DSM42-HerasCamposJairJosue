<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModelCategory
 * 
 * @property int $id
 * @property string $description
 * @property int $categories_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Category $category
 *
 * @package App\Models
 */
class ModelCategory extends Model
{
	use SoftDeletes;
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
		return $this->belongsTo(Category::class, 'categories_id');
	}
}
