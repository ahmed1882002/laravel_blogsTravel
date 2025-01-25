<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        $blogs=Blog::paginate(4);
        $sliderBlog=Blog::latest()->take(5)->get();
        return view('theme.index',compact('blogs','sliderBlog'));
    }
    public function contact(){
        return view('theme.contact');
    }
    public function category($id){
        $categories_id=Category::find($id)->name;
        $blogs=Blog::where('category_id',$id)->paginate(4);
        return view('theme.category',compact('blogs','categories_id'));
    }
    // public function singel_bloge(){
    //     return view('theme.singel-bloge');
    // }
    // public function login(){
    //     return view('theme.login');
    // }
    // public function register(){
    //     return view('theme.register');
    // }
}
