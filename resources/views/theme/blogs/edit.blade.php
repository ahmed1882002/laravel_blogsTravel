@extends('theme.master')
@section('title', 'Add New Blog')
@section('contant')
    <!--================ Hero sm banner start =================-->
    @include('theme.partials_theme.hero', ['title' => 'Edit the Blog'])

    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('BlogeUpdateCategory'))
                        <div class="alert alert-success" role="alert">
                            {{ session('BlogeUpdateCategory') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update', ['blog' => $blog]) }}" class="form-contact contact_form" method="post"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input class="form-control border" name="name" value="{{ $blog->name }}" type="text"
                                placeholder="Enter your tilel">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="image" type="file">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control border" name="category_id"
                                        placeholder="Enter your caregory">
                                        <option value="">Select Category</option>
                                        @if (count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $blog->category_id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="w-100 border" name="description" placeholder="Enter your blog title" rows="5">{{ $blog->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button-active button-contactForm">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
