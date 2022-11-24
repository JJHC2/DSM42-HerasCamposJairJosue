<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Detail
 * 
 * @property int $id
 * @property string $status
 * @property int $actual_amount
 * @property int $inventory_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Inventory $inventory
 *
 * @package App\Models
 */
class Detail extends Model
{
	use SoftDeletes;
	protected $table = 'details';

	protected $casts = [
		'actual_amount' => 'int',
		'inventory_id' => 'int'
	];

	protected $fillable = [
		'status',
		'actual_amount',
		'inventory_id'
	];

	public function inventory()
	{
		return $this->belongsTo(Inventory::class);
	}
}
