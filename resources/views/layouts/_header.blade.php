<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">weibo App</a>
        <ul class="navbar-nav justify-content-end">
            @if ( Auth::check())
            <li class="nav-item"><a class="nav-link" href="#">用户列表</a></li>
            <li class="na-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                    {{ Auth::user()->name }}
                </a>
                <div class="" aria-labelledby="">
                    <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}"></a>
                        <a class="dropdown-item" href="{{ route('users.edit',Auth::user()) }}">编辑资料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logout" href="#">
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                            </form>

                        </a>
                    <script>
                        $(function () {
                            $("#navbarDropdown").click(function () {
                                $(this).text("dropdown-menu").is(":hidden");
                                $("#dropdown-menu").slideToggle();
                            })
                        })
                    </script>
                </div>
            </li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('signup') }}">注册</a></li>
            @endif
        </ul>
    </div>
</nav>