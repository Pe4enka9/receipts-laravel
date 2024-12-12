<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->withSum('receipts as total_quantity', 'quantity')
            ->orderBy('id', 'desc')
            ->get();

        return view('index', ['products' => $products]);
    }

    public function createShow(): View
    {
        return view('create');
    }

    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'article' => ['nullable', 'string', 'max:255'],
        ], [
            'name.required' => 'Имя товара обязательно!',
            'name.max' => 'Имя товара должно содержать не больше :max символов!',

            'price.required' => 'Цена обязательна!',
            'price.integer' => 'Цена должно содержать только числа!',

            'article.max' => 'Артикул должен содержать не больше :max символов!',
        ]);

        Product::query()->create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'article' => $validated['article'] ?? mt_rand(),
        ]);

        return redirect()->route('products.index');
    }

    public function editShow(string $article): View
    {
        $product = Product::query()->where('article', $article)->first();

        return view('edit', ['product' => $product]);
    }

    public function edit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'article' => ['nullable', 'string', 'max:255'],
        ], [
            'name.required' => 'Имя товара обязательно!',
            'name.max' => 'Имя товара должно содержать не больше :max символов!',

            'price.required' => 'Цена обязательна!',
            'price.integer' => 'Цена должно содержать только числа!',

            'article.max' => 'Артикул должен содержать не больше :max символов!',
        ]);

        $product = Product::query()->where('id', $request->id)->first();

        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'article' => $validated['article'] ?? mt_rand(),
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(string $article): RedirectResponse
    {
        $product = Product::query()->where('article', $article)->first();

        $product->delete();

        return redirect()->route('products.index');
    }
}
