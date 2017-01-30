<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>{{$title}}</title>
<link rel="icon" href="favicon.png" type="image/png">
<link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css">

<script type="text/javascript" src="{{asset('public/assets/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/bootstrap-filestyle.min.js')}}"></script>
 
</head>
<body>

<header id="header_wrapper">
	@yield('header') 
	
	
@if (count($errors) > 0)
    <div class="alert alert-danger" style="width: 300px; margin: 0 auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" style="width: 300px; margin: 0 auto">
        {{ session('status') }}
    </div>
@endif
</header>
	@yield('content')
<script>
    setTimeout("$('.alert').fadeOut(2000);", 7000);
</script>
</body>
</html>
