<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Queries\ProductQuery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Все товары
     *
     * @param Request $request
     * @param ProductQuery $productQuery
     * @return View
     */
    public function index(Request $request, ProductQuery $productQuery): View
    {
        /** @var Product[] $products */
        $products = $productQuery->filter($request->get('category_id'));

        /** @var Category[] $categories */
        $categories = Category::all();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Страница создания товара
     *
     * @return View
     */
    public function create(): View
    {
        /** @var Category[] $categories */
        $categories = Category::all();

        return view('products.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Создание товара в БД
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('products.index');
    }

    /**
     * Подробнее о товаре
     *
     * @param Product $product
     * @return View
     */
    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Страница редактирования товара
     *
     * @param Product $product
     * @return View
     */
    public function edit(Product $product): View
    {
        /** @var Category[] $categories */
        $categories = Category::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Обновление товара в БД
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Удаление товара из БД
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
