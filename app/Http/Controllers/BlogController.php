<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //constract
    // public function __construct()
    // {
    //     $this->middleware('auth')->only([
    //         'create',
    //         'store',


    //     ]);
    // }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            # code...
            $categories = Category::get();
            return view('theme.blogs.create', compact('categories'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            // dd($request->all());
            $data = $request->validate(
                [
                    'name' => 'required',
                    'description' => 'required',
                    'category_id' => 'required|exists:categories,id',
                    'image' => 'required|mimes:jpg,jpeg,png,gif,svg'

                ],
                [],
                [
                    'category_id' => 'category',
                ]
            );
            $image = $request->image;
            $NewNameImage = time() . '--' . $image->getClientOriginalName();
            $image->storeAs('blogs', $NewNameImage, 'public');
            $data['image'] = $NewNameImage;
            $data['user_id'] = Auth::user()->id;

            Blog::create($data);
            return back()->with('BlogeNewCategory', 'The data is sended');
        }
        abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (Auth::check()) {
            return view('theme.singel-bloge', compact('blog'));
        }
        return view('theme.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::check()) {
            if ($blog->user_id == Auth::user()->id) {
                $categories = Category::get();
                // $blogs=Blog::get()->latast();
                return view('theme.blogs.edit', compact('categories', 'blog'));
            }
            abort(403);
        }
        return view('theme.login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if (Auth::check()) {
            if ($blog->user_id == Auth::user()->id) {

                $data = $request->validate(
                    [
                        'name' => 'required',
                        'description' => 'required',
                        'category_id' => 'required|exists:categories,id',
                        'image' => 'nullable|mimes:jpg,jpeg,png,gif,svg'

                    ],
                    [],
                    [
                        'category_id' => 'category',
                    ]
                );
                if ($request->hasFile('image')) {
                    # code...
                    Storage::delete("public/blogs/$blog->image");
                    $image = $request->image;
                    $NewNameImage = time() . '--' . $image->getClientOriginalName();
                    $image->storeAs('blogs', $NewNameImage, 'public');
                    $data['image'] = $NewNameImage;
                }
                $blog->update($data);
                return back()->with('BlogeUpdateCategory', 'The data was Updated');
            }
            abort(404);
        }
        return view('theme.login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::check()) {
            if ($blog->user_id == Auth::user()->id) {


                if ($blog->user_id == Auth::user()->id) {
                    Storage::delete("profile/blogs/$blog->image");
                    $blog->delete();
                    return back()->with('BlogDelete', 'The blog was deleted');
                }
            }
            abort(404);
        }
        return view('theme.login');
    }
    public function myBlogs()
    {
        if (Auth::check()) {

            $blogs = Blog::where('user_id', Auth::user()->id)->latest()->paginate(5);
            return view('theme.blogs.my-blog', compact('blogs'));
        }
        abort(404);
    }
}
