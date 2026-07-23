<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Product;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $transactions = Transaction::with('product')->get();

    return view('transactions.index', compact('transactions'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $products = Product::all();

    return view('transactions.create', compact('products'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'qty' => 'required|numeric|min:1',
    ]);

    // Ambil data produk
    $product = Product::findOrFail($request->product_id);

    // Cek apakah stok mencukupi
if ($product->stock < $request->qty) {
    return back()
        ->withInput()
        ->with('error', 'Stok tidak mencukupi.');
}

    // Hitung total
    $total = $product->price * $request->qty;

    // Simpan transaksi
    Transaction::create([
        'product_id' => $product->id,
        'qty' => $request->qty,
        'total' => $total,
    ]);

    // Kurangi stok
    $product->stock -= $request->qty;
    $product->save();

    return redirect()->route('transactions.index')
        ->with('success', 'Transaksi berhasil.');
}

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
{
    $products = Product::all();

    return view('transactions.edit', compact('transaction', 'products'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'product_id' => 'required',
        'qty' => 'required|integer|min:1',
    ]);

    // Kembalikan stok lama
    $oldProduct = Product::findOrFail($transaction->product_id);
    $oldProduct->stock += $transaction->qty;
    $oldProduct->save();

    // Produk baru
    $product = Product::findOrFail($request->product_id);

    // Cek stok
    if ($product->stock < $request->qty) {

        // Balikkan stok lama lagi
        $oldProduct->stock -= $transaction->qty;
        $oldProduct->save();

        return back()
            ->withInput()
            ->with('error', 'Stok tidak mencukupi.');
    }

    // Kurangi stok baru
    $product->stock -= $request->qty;
    $product->save();

    // Update transaksi
    $transaction->update([
        'product_id' => $product->id,
        'qty' => $request->qty,
        'total' => $product->price * $request->qty,
    ]);

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil diupdate.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
{
    // Kembalikan stok
    $product = Product::findOrFail($transaction->product_id);

    $product->stock += $transaction->qty;
    $product->save();

    // Hapus transaksi
    $transaction->delete();

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil dihapus.');
}
}
