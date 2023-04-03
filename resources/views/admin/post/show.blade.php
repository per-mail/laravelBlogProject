@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $post->title }}</h1>
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="text-success"><i
                                class="fas fa-pencil-alt"></i></a></td>
                        <form action="{{ route('admin.post.delete', $post->id) }}"
                              method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Название</td>
                                        <td>{{ $post->title }}</td>
                                    </tr>                                    
                                    <tr>
                                        <td>Категория</td>
                                        <td>{{ $post->category->title }}</td>
                                    </tr>                                                                   
                                    <tr>
                                        <td>Дата добавления продукта</td>
                                        <td>{{ $post->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата обновления продукта</td>
                                        <td>{{ $post->updated_at }}</td>
                                    </tr>                         
                                    <tr>
                                        <td>Главная картинка</td>
                                        <td><section class="blog-post-featured-img" data-aos="fade-up">
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="post image" class="w-100">
                                    </section></td>
                                    <tr>
                                        <td>Картинка</td>
                                        <td><section class="blog-post-featured-img" data-aos="fade-up">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="post image" class="w-100">
                                    </section></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
