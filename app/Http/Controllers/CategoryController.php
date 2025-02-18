<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Все категории
     *
     * @return View
     */
    public function index(): View
    {
        /** @var Category[] $categories */
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Страница создания категории
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Создание категории в БД
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Подробнее о категории
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('categories.show', [
            'category' => $category,
        ]);
    }

    /**
     * Страница редактирования категории
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Обновление категории в БД
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $validated = $request->validated();

        $category->update($validated);

        return redirect()->route('categories.index');
    }

    /**
     * Удаление категории из БД
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
