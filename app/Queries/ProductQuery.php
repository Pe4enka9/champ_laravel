<?php

namespace App\Queries;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductQuery
{
    /**
     * Фильтрация по категориям
     *
     * @param string|null $categoryId
     * @return Collection
     */
    public static function filter(?string $categoryId): Collection
    {
        $query = Product::query();

        if ($categoryId && $categoryId !== 'all') {
            $query->where('category_id', $categoryId);
        }

        return $query->get();
    }
}
