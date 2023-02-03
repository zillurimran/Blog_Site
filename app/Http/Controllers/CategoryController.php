<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.category',[
            'categories'=>Category::all()
        ]);
    }

    public function saveCategory(Request $request){
        Category:: SaveCategory($request);
        return back();
    }

    public function editCategory($id){
        $category= Category::find($id);

        return view('admin.category.edit-category',[
            'category'=>$category
        ]);
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect(route('category'));
    }

    public function deleteCategory(Request $request){
        $category = Category::find($request->category_id);
        $category->delete();
        return back();

    }
}


