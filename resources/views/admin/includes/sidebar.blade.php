<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar-->
    <nav class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                {{--                ссылка на категории, admin.post.index - имя роута--}}
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>Посты</p>
                </a>
            <li class="nav-item">
                {{--                ссылка на категории, admin.category.index - имя роута--}}
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>Категории</p>
                </a>
            <li class="nav-item">
                {{--                ссылка на категории, admin.tag.index - имя роута--}}
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Тэги</p>
                </a>
            </li>
        </ul>
        </div>
    </nav>
</aside>
