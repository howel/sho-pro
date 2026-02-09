<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtro por búsqueda de texto
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Filtro por categoría
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $products = $query->where('status', 1)->paginate(12);
        $categories = Category::all();

        return view('pages.tienda', compact('products', 'categories'));
    }
}