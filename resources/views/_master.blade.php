<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! Html::style('http://yui.yahooapis.com/pure/0.5.0/pure-min.css') !!}
	{!! Html::style('http://purecss.io/css/layouts/side-menu.css') !!}
	<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
	{!! Html::style('css/artdb.css') !!}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	@yield('script')
	

    
</head>
<body>
	@if (Session::has('flash_message'))
		<div class="alert alert-success">{!! Session::get('flash_message') !!}</div>
		<h1 id="title">@yield('header')</h1>
	@endif


{!! Form::close() !!}
				<div id="header_links">
		@if(Auth::check())
	  		<a href='/logout'>Log out {!! Auth::user()->username; !!}</a>
	  	@else
			@if(Request::path()=="login")
				<a href='/signup'>Sign up</a>
				<a href='/'>ArtDB</a>

			@elseif(Request::path()=="signup")
				<a href='/auth/login'>Log in</a>
				<a href='/'>ArtDB</a>
			@else
			    <a href='/signup'>Sign up</a>
			    <a href='/auth/login'>Log in</a>

			@endif
		@endif


<div class="content">
    @yield('content')
</div>
</body>
</html>