<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar-->
    <nav class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                {{--                ссылка на категории, personal.user.index - имя роута--}}
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li class="nav-item">
                {{--                ссылка на категории, personal.liked.index - имя роута--}}
                <a href="{{ route('personal.liked.index') }}" class="nav-link">
                    <i class="nav-icon far fa-heart"></i>
                    <p>Понравившиеся посты</p>
                </a>
            </li>
            <li class="nav-item">
                {{--                ссылка на категории, personal.post.index - имя роута--}}
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>Комментарии</p>
                </a>
            </li>
        </ul>
        </div>
    </nav>
</aside>
