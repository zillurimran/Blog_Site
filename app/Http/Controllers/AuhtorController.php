<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
class AuhtorController extends Controller
{

    public function index(){
        return view('admin.author.author',[
            'authors'=>Author::all()
        ]);
    }

    public function saveAuthor(Request $request){
        Author:: saveAuthor($request);
        return back();
    }

    public function editAuthor($id){
        $author = Author::find($id);
        return view('admin.author.edit-author',[
            'author'=>$author
        ]);
    }

    public function updateAuthor(Request $request){
        $author = Author::find($request->author_id);
        $author->author_name = $request->author_name;
        $author->save();
        return redirect(route('author'));
    }

    public function deleteAuthor(Request $request){
        $author = Author::find($request->author_id);
        $author->delete();
        return back();
    }

}
