<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReceiptController extends Controller
{
    public function index(): View
    {
        $receipts = Receipt::query()->orderBy('created_at', 'desc')->get();

        return view('receipts.index', ['receipts' => $receipts]);
    }

    public function createShow(): View
    {
        $products = Product::all();

        return view('receipts.create', ['products' => $products]);
    }

    public function create(Request $request): RedirectResponse
    {
        date_default_timezone_set('Asia/Krasnoyarsk');

        $validated = $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
            'created_at' => ['nullable', 'date'],
        ], [
            'product_id.required' => 'Товар обязателен!',
            'quantity.required' => 'Количество обязательно!',
        ]);

        Receipt::query()->create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'created_at' => $validated['created_at'] ?? date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('receipts.index');
    }

    public function editShow(int $id): View
    {
        $receipt = Receipt::query()->findOrFail($id);
        $products = Product::all();

        return view('receipts.edit', ['receipt' => $receipt, 'products' => $products]);
    }

    public function edit(Request $request, int $id): RedirectResponse
    {
        date_default_timezone_set('Asia/Krasnoyarsk');

        $validated = $request->validate([
            'product_id' => ['required'],
            'quantity' => ['required'],
            'created_at' => ['nullable', 'date'],
        ], [
            'product_id.required' => 'Товар обязателен!',
            'quantity.required' => 'Количество обязательно!',
        ]);

        $receipt = Receipt::query()->findOrFail($id);

        $receipt->update([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'created_at' => $validated['created_at'] ?? date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('receipts.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $receipt = Receipt::query()->where('id', $id)->first();

        $receipt->delete();

        return redirect()->route('receipts.index');
    }
}
