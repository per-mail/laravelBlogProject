<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блог :: Главная</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/font-awesome/css/all.min.css' }}">
    <link rel="stylesheet" href="{{ 'assets/vendors/aos/aos.css' }}">
    <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
    <script src="{{ 'assets/vendors/jquery/jquery.min.js' }}"></script>
    <script src="{{ 'assets/js/loader.js' }}"></script>


 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.index') }}">Блог</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Категории</a>
                    </li>

                    <li class="nav-item">
{{--                        режим работы в личном кабинете--}}
                        @auth()
                            <a class="nav-link" href="{{ route('personal.main.index') }}">Личный кабинет</a>
                        @endauth()
{{--                        вход в Личный кабинет<--}}
                        @guest()
                            <a class="nav-link" href="{{ route('personal.main.index') }}">Войти</a>
                        @endguest()
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')


<footer data-aos="fade-up">
    Мой блог
</footer>
<script src="{{ 'assets/vendors/popper.js/popper.min.js' }}"></script>
<script src="{{ 'assets/vendors/bootstrap/dist/js/bootstrap.min.js' }}"></script>
<script src="{{ 'assets/vendors/aos/aos.js' }}"></script>
<script src="{{ 'assets/js/main.js' }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
