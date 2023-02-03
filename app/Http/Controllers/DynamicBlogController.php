<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use DB;
use Session;
use function Termwind\renderUsing;

class DynamicBlogController extends Controller
{
    public function index(){
        $sideBlog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('category_id',4)
            ->take(1)
            ->get();


        $blogs_left = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->orderby('id','desc')
            ->take(3)
            ->get();


        $blogs_right = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->orderby('id','desc')
            ->skip(3)
            ->take(3)
            ->get();


        $trending = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('blog_type','trending')
            ->get();

            return view('frontEnd.home.home',[
                'sideBlogs' => $sideBlog,
                'blog_left' => $blogs_left,
                'blog_right' => $blogs_right,
                'trendings' => $trending,

        ]);
    }

    public function detailsBlog($slug){
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('slug',$slug)
            ->first();


        $catId = $blog->category_id;
        $categoryWiseBlog = DB::table('blogs')
             ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('category_id',$catId)
            ->get();


        $comments = DB::table('comments')
            ->join('blog_users','comments.user_id','blog_users.id')
            ->select('comments.*','blog_users.name')
            ->where('comments.blog_id',$blog->id)
            ->get();

        return view('frontEnd.blog.blog',[
            'blog'=> $blog,
            'categoryWiseBlogs'=> $categoryWiseBlog,
            'comments' => $comments
        ]);
    }


    public function about(){
        return view('frontEnd.about.about');
    }


    public function contact(){
        return view('frontEnd.contact.contact');
    }


    public function category($categoryId){
        $categoryWiseBlog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('category_id',$categoryId)
            ->get();

        $category = Category::where('id',$categoryId)->first();

        return view('frontEnd.category.category',[
            'categoryWiseBlogs'=>$categoryWiseBlog,
            'category'=>$category
        ]);
    }


    public function userRegister(){
        return view('frontEnd.user.register');
    }


    public function saveUser(Request $request){
        $users = new BlogUser();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->password = bcrypt($request->password);
        $users->save();

        return back();
    }


    public function userLogin(){
        return view('frontEnd.user.login');
    }


    public function checkUser(Request $request){
        $userInfo = BlogUser::where('email',$request->user_name)
                            ->orWhere('phone',$request->user_name)
                            ->orWhere('name',$request->user_name)
                            ->first();
        if($userInfo){
            $existingPass = $userInfo->password;
            if(password_verify($request->password,$existingPass)){
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect(route('home'));
            }else{
                return back()->with('message','Incorrect password');
            }

        }else{
            return back()->with('message','Please use valid user name');
        }
    }


    public function logout(){
        Session::forget('userId');
        Session::forget('userName');
        return redirect(route('home'));
    }

    public function ajaxDetailsBlog($id){
        $blog = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.id',$id)
            ->first();

        return json_encode($blog);
    }
}
