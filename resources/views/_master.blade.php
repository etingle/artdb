<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! Html::style('http://yui.yahooapis.com/pure/0.5.0/pure-min.css') !!}
	{!! Html::style('http://purecss.io/css/layouts/side-menu.css') !!}
	<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>
	{!! Html::style('/css/artdb.css') !!}
	

    
</head>
<body>
	@if (Session::has('flash_message'))
		<div class="alert alert-success">{!! Session::get('flash_message') !!}</div>
		<h1 id="title">@yield('header')</h1>
	@endif
</div>
</div>

<div class="content">
    @yield('content')
</div>
</body>
</html>