@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <!-- используем для регистрации пользователей StoreController -->
                        <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
{{--                                name='name': name-берём из базы --}}
                                <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
                                       value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                       value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password" placeholder="Введите пароль">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group w-50">
                                    <label>Выберите роль пользователя</label>
                                    <select name="role" class="form-control">
{{--                                 в методе foreach разбиваем массив $roles на ключ => значение--}}
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}"
                                                {{ $id == old('role_id') ? ' selected': '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
