<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicBlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuhtorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;





//=========Blog==========
Route::get('/',[DynamicBlogController::class,'index'])->name('home');
Route::get('/about',[DynamicBlogController::class,'about'])->name('about');
Route::get('/contact',[DynamicBlogController::class,'contact'])->name('contact');
Route::get('/blogs-category/{categoryId}',[DynamicBlogController::class,'category'])->name('blogs.category');




//=========Blog User=========
Route::get('/user-register',[DynamicBlogController::class,'userRegister'])->name('user.register');
Route::post('/user-register',[DynamicBlogController::class,'saveUser'])->name('user.register');
Route::get('/user-login',[DynamicBlogController::class,'userLogin'])->name('user.login');
Route::post('/user-login',[DynamicBlogController::class,'checkUser'])->name('user.login');
Route::get('/user-logout',[DynamicBlogController::class,'logout'])->name('user.logout');


//==========Comments===========
Route::post('/new-comment',[CommentController::class,'saveComment'])->name('new.comment');


//============Blog Users Middleware=============
Route::group(['middleware'=>'blogUser'],function (){
    Route::get('/blog-details/{slug}',[DynamicBlogController::class,'detailsBlog'])->name('blog.details');

});


//=============Authentication===============
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete.category');


    Route::get('/author',[AuhtorController::class,'index'])->name('author');
    Route::post('/new-author',[AuhtorController::class,'saveAuthor'])->name('new.author');
    Route::get('/edit-author/{id}',[AuhtorController::class,'editAuthor'])->name('edit.author');
    Route::post('/update-author',[AuhtorController::class,'updateAuthor'])->name('update.author');
    Route::post('/delete-author',[AuhtorController::class,'deleteAuthor'])->name('delete.author');


    Route::get('/add-blog',[BlogController::class,'index'])->name('add.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update.blog');
    Route::post('/delete-blog',[BlogController::class,'deleteBlog'])->name('delete.blog');


    Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
});
