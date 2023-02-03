<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.add-blog',[
            'categories'=>Category::all(),
            'authors'=>Author::all()
        ]);
    }

    public function saveBlog(Request $request){

        $blog = new Blog();
        $blog->category_id      = $request->category_id;
        $blog->author_id        = $request->author_id;
        $blog->title            = $request->title;
        $blog->slug             = $this->makeSlug($request);
        $blog->description      = $request->description;
        $blog->image            = $this->saveImage($request);
        $blog->date             = $request->date;
        $blog->blog_type        = $request->blog_type;
        $blog->status           = $request->status;
        $blog->save();

        return redirect(route('manage.blog'));
    }

    public function saveImage($request){
        $image = $request->file('image');
        $imageName = rand().'.'.$image->extension();
        $directory = 'upload/blog-image/';
        $imageUrl = $directory.$imageName;
        $image->move( $directory,$imageName);
        return $imageUrl;
    }

    public function makeSlug($request){
        if ($request->slug){
            $slug = $request->slug;
            return preg_replace('/\s+/u','+',trim($slug));
        }
        $slug = $request->title;
        return preg_replace('/\s+/u','-',trim($slug));
    }

    public function manageBlog(){
        return view('admin.blog.manage-blog',[
            'blogs'=>DB::table('blogs')
                    ->join('categories','blogs.category_id','categories.id')
                    ->join('authors','blogs.author_id','authors.id')
                    ->select('blogs.*','categories.category_name','authors.author_name')
                    ->orderBy('id','desc')
                    ->get()
        ]);
    }

    public function status($id){
        $blog = Blog::find($id);
        if ($blog->status == 1){
            $blog->status = 0;
        }else{
            $blog->status = 1;
        }

        $blog->save();
        return back();
    }

    public function editBlog($id){

        return view('admin.blog.edit-blog',[
            'blog' => Blog::find($id),
            'categories'=>Category::all(),
            'authors'=>Author::all()
        ]);
    }

    public function updateBlog(Request $request){
          $blog = Blog::find($request->blog_id);
          $blog->category_id = $request->category_id;
          $blog->author_id = $request->author_id;
          $blog->title = $request->title;
          $blog->slug = $this->makeSlug($request);
          $blog->description = $request->description;
          if($request->file('image')){
              if (file_exists($blog->image)){
                  unlink($blog->image);
              }
              $blog->image = $this->saveImage($request);
          }
          $blog->date = $request->date;
          $blog->blog_type = $request->blog_type;
          $blog->status = $request->status;
          $blog->save();
          return redirect(route('manage.blog'));
    }

    public function deleteBlog(Request $request){
        $blog = Blog::find($request->blog_id);
        if($blog->image){
            if (file_exists($blog->image)){
                unlink($blog->image);
            }
        }
        $blog->delete();
        return back();
    }

}
