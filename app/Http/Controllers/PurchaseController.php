<?php

namespace App\Http\Controllers;

use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        // Додати пошук
        $purchases = Purchase::where('user', auth()->id())->latest()->get();
        $title = 'Your purchases | UnReceipts';

        return view('purchase/index', [
            'title' => $title,
            'purchases' => $purchases
        ]);
    }

    public function create()
    {
        $title = "New purchase | UnReceipts";

        return view('purchase/create', [
            'title' => $title
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' =>     ['required', 'max:255'],
            'price' =>    ['required', 'gt:0', 'max_digits:12'],
            'category' => ['required', 'max:255']
        ]);
        $attributes['user'] = auth()->id();
        Purchase::create($attributes);

        return redirect('purchases');
    }

    public function show(Purchase $purchase)
    {
        $title = "{$purchase->name} | UnReceipts";

        return view('purchase/show', [
            'title' => $title,
            'purchase' => $purchase,
        ]);
    }

    public function edit(Purchase $purchase)
    {
        $title = "Edit {$purchase->name} | UnReceipts";

        return view('purchase/edit', [
            'title' => $title,
            'purchase' => $purchase
        ]);
    }

    public function update(Purchase $purchase)
    {
        $attributes = request()->validate([
            'name' =>     ['required'],
            'price' =>    ['required'],
            'category' => ['required'],
        ]);

        $purchase->update($attributes);

        return redirect("purchase/{$purchase->id}");
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect('purchases');
    }
}
