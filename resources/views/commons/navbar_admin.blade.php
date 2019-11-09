<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/admin/home">Music School (管理画面)</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="dropdown-item">{!! link_to_route('lessons.create', 'レッスン登録') !!}</li>
                    <li class="dropdown-item">{!! link_to_route('teachers.create', '講師登録') !!}</li>
                    <li class="dropdown-item">{!! link_to_route('courses.create', 'コース登録') !!}</li>
                    <li class="dropdown-item">{!! link_to_route('admin.logout', '管理者ログアウト') !!}</li>
                @else
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>