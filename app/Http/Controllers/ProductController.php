<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Все товары
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        /** @var Product[] $products */
        $products = Product::filter($request);

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
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        /** @var Product $product */
        $product = Product::query()->findOrFail($id);

        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Страница редактирования товара
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        /** @var Product $product */
        $product = Product::findOrFail($id);

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
     * @param int $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        /** @var Product $product */
        $product = Product::findOrFail($id);

        $product->update($validated);

        return redirect()->route('products.index');
    }

    /**
     * Удаление товара из БД
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        /** @var Product $product */
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
