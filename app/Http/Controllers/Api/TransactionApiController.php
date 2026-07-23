<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Transaction::with('product')->get()
        );
    }

    public function show(Transaction $transaction)
    {
        return response()->json(
            $transaction->load('product')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json([
            'message' => 'Transaksi berhasil ditambahkan',
            'data' => $transaction
        ], 201);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        $transaction->update($request->all());

        return response()->json([
            'message' => 'Transaksi berhasil diupdate',
            'data' => $transaction
        ]);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json([
            'message' => 'Transaksi berhasil dihapus'
        ]);
    }
}