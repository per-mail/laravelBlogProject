@extends('layouts.app')
{{--шаблон для изучения тестирования--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>
                    <div class="card-body">
                        @foreach($posts as $post)
                            {{$post->title}}<br/>
                            {{$post->body}}
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
