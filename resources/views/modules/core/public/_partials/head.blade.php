<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title',$websiteTitle)</title>
<meta name="description" content="{!! config('myapp.website_description') !!}">
<meta name="keywords" content="{!! config('myapp.website_keywords') !!}">
<meta name="author" content="">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="icon" type="image/x-icon" href="{{ asset('assets/public/img/fav.jpg') }}"/>

<link rel="stylesheet" href="{{ asset('assets/public/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/public/css/custom.css') }}">

@yield('css')