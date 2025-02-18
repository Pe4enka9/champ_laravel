<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @method static create(array $data)
 * @method static findOrFail(int $id)
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category_id',
    ];

    /**
     * Категории
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Фильтрация по категориям
     *
     * @param Request $request
     * @return Collection
     */
    public static function filter(Request $request): Collection
    {
        $query = Product::query();

        if ($request->has('category_id') && $request->category_id !== 'all') {
            $query->where('category_id', $request->category_id);
        }

        return $query->get();
    }
}
