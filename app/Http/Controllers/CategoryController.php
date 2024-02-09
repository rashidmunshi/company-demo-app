<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::with('products')->withCount('products')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('category_name', function ($row) {
                    return $row->name;
                })
                ->addColumn('product_name', function ($row) {
                  return $row->products->pluck('name')->implode(', ');
                })
                ->addColumn('product_count', function ($row) {
                    return $row->products_count;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('category.index');
    }
}
