<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('category')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->name;
                })
                ->addColumn('product_name', function ($row) {
                    return $row->category->name;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('product.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name
        ];

        Product::create($data);

        return redirect()->route('products.index');
    }
}
