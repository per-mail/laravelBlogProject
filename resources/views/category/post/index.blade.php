@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row mb-4">
                    {{--                    методом  @foreach выводим посты из переменной $posts--}}
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset( 'storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                {{--                            показ лайков для авторизованных пользователей--}}
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="border -0 bg-transparent">
                                            {{--    auth() - получаем авторизованных пользователей, user()- получаем нужного пользователя--}}
                                            {{--    likedPosts - возврвщает список пролайканных постов, contains() - проверяет есть ли в этом списке нужный $post->id--}}
                                            {{--                                    условие если пост уже пролайкан то выводим значок--}}
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                                {{--                                            если нет то то выводим значок--}}
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                            {{--                                        --}}{{--                                        ВТОРОЙ ВАРИАНТ КАК МОЖНО ИЗМЕНЕНЯТЬ ЗНАЧКИ ЛАЙКОВ--}}
                                            {{--                                        @auth()--}}
                                            {{--                                            --}}{{--                                           если условие верно добаввляем к fa 's' если ложь 'r', так меняем отображение значка лайков--}}
                                            {{--                                            <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>--}}
                                            {{--                                        @endauth()--}}
                                        </button>
                                    </form>
                                {{--                            показ лайков для неавторизованных пользователей--}}
                                @guest()
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest()
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{--                    выводим пагинацию, class="mx-auto" - выводит пагинацию по центру, style="margin-top: -40px - уменьшаем отступы --}}
                    <div class="mx-auto" style="margin-top: -100px; ">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-md-8">
                    {{--                выводим снизу случайные посты --}}

        </div>
        </div>
    </main>
@endsection
