@extends('theme.master')
@section('title', 'Add New Blog')
@section('contant')
    <!--================ Hero sm banner start =================-->
    @include('theme.partials_theme.hero', ['title' => 'My blogs'])

    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('BlogeNewCategory'))
                        <div class="alert alert-success" role="alert">
                            {{ session('BlogeNewCategory') }}
                        </div>
                    @endif
                    @if (session('BlogDelete'))
                        <div class="alert alert-success" role="alert">
                            {{ session('BlogDelete') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <div class="table-responsive-lg">

                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($blogs) > 0)
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('blogs.show', ['blog' => $blog]) }}" class="text-decoration-none text-dark">
                                                        {{ $blog->name }}
                                                    </a>
                                                </td>
                                                <td class="text-center">                                                 
                                                    <a href="{{ route('blogs.edit', ['blog' => $blog]) }}" class="btn btn-sm btn-primary mr-2">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                              
                                                    <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2" class="text-center">No blogs found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="">
                            {{ $blogs->render('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
