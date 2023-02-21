@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
                                @csrf
                                @method("PATCH")
                                <div class="form-group">
                                    <textarea class="form-control" name="message"  cols="30" rows="10">{{ $category->message }}"></textarea>
                                    @error('message')
                                    <div class="text-danger">*Поле обязательно для заполнения ({{ $message }}) </div>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
@endsection
