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
                <section class="py-3">
                   @auth()
                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                            {{--                          выводим количество лайков у поста, которое считается в моделе Post --}}
                                        <span>{{ $post->liked_users_count }}</span>
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
                    @endauth()
                    {{--                            показ лайков для неавторизованных пользователей--}}
                    @guest()
                        <div>
                              <span>{{ $post->liked_users_count }}</span>
                              <i class="far fa-heart"></i>
                         </div>

                    @endguest()
                </section>
{{--                условие если нет рекомендуемых постов, скрываем секцию--}}
                {{--                так-как $relatedPosts-коллекция то при помощи count() считаем её содержимое и если оно > 0, то условие верно--}}
                @if($relatedPosts->count() > 0)
                    <section>
                    <div class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Рекомендуемые посты</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4 blog-post" data-aos="fade-right">
                                     <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $relatedPost->main_image) }}" alt="related post"
                                 class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <a href="{{ route('post.show', $relatedPost->id) }}"> <h5
                                    class="post-title">{{ $relatedPost->title }}</h5></a>
                            </div>
                        @endforeach
                      </div>
                   </div>
                   </div>
                </section>
                @endif
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
