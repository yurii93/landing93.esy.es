<div class="container">
    <div class="header_box">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('public/assets/img/logo.png') }}" alt="logo"></a></div>
        @if(isset($menu))
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
            <div id="main-nav" class="collapse navbar-collapse navStyle">
                <ul class="nav navbar-nav" id="mainNav">
                    @foreach($menu as $item)
                    <li><a href="#{{ $item['alias'] }}" class="scroll-link">{{ $item['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </nav>
        @endif
    </div>
</div>
@if(session('status'))
    <div class="alert alert-success" style="width: 300px; margin: 0 auto">
        {{ session('status') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" style="width: 300px; margin: 0 auto">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif