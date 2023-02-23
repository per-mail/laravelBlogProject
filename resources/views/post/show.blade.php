@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta">{{ $data->translatedFormat('F') }} / {{ $data->day }} / {{ $data->year }}
                / {{ $data->format('H:i') }} / {{ $post->comments->count() }} комментарий (я)</p>
            <section class="blog-post-featured-img" data-aos="fade-up">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {{--                    выводим контент в таких скобках чтобы сохранить форматирование--}}
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
            <span class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4">Рекомендуемые посты</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                        </div>
                            <a class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post"
                                 class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <a href="{{ route('post.show', $relatedPost->id) }}"> <h5
                                    class="post-title">{{ $relatedPost->title }}</h5></a>
                        @endforeach
                    </div>
                </section>
                <section class="comment-list mb-5">
                    <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                 @foreach($post->comments as $comment)
                        <div class="comment-text mb-3">
                <span class="username">
                    <div>
                        {{ $comment->user->name }}
                    </div>
                <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
            </span>
                    {{ $comment->message }}
            </div>
                    @endforeach
            </section>
{{--                оборачиваем в @auth(), чтобы форма была доступна только авторизованным пользователям--}}
                @auth()
                    <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                    <form action="{{ route('post.comment.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control"
                                          placeholder="Оставьте коментарий" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
            </span>
            </div>
        </div>
    </main>
@endsection
