<?php

namespace App\Http\Controllers;


use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Product::with('category');

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->paginate(5)->withQueryString();

    return view('products.index', compact('products'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    $categories = Category::all();

    return view('products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'category_id' => 'required',
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
    ]);

    Product::create([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Product $product)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'description' => 'nullable',
    ]);

    $product->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil diupdate.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
{
    $product->delete();

    return redirect()->route('products.index')
        ->with('success', 'Produk berhasil dihapus.');
}


public function exportExcel()
{
    return Excel::download(
        new ProductsExport,
        'Data_Produk.xlsx'
    );
}

public function exportPdf()

{
    $products = Product::with('category')->get();

    $pdf = Pdf::loadView('products.pdf', compact('products'))
        ->setPaper('A4', 'landscape');

    return $pdf->download('Data_Produk.pdf');
}
}
