@extends('layouts.site')

@section('header')

    <div class="container">
        <div class="header_box">
            <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('public/assets/img/logo.png') }}" alt="logo"></a></div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-warning" style="width: 300px; margin: 0 auto">
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
@endsection

@section('content')

    <div class="container" style="width: 300px">
        <form action="{{ route('post_login') }}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection