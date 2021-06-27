<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function admin()
    {
        return view('admin', [
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return back();
    }

    public function delete(Category $category)
    {
        $category->delete();
        return back();
    }
}
