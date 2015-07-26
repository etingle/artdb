<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {!! Html::style('http://yui.yahooapis.com/pure/0.5.0/pure-min.css') !!}
	{!! Html::style('http://purecss.io/css/layouts/side-menu.css') !!}
    
</head>
<body>

	
		<h1 id="title">@yield('header')</h1>
		
</div>
</div>

<div class="content">
    @yield('content')
</div>
</body>
</html>