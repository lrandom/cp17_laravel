<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document - @yield('title','Trang chủ')</title>
</head>
<body>
<nav>
    <a href="">Home</a>
    <a href="">Contact</a>
    <a href="">About Us</a>
</nav>

@section('main-content')
     <div>Nội dung mặc định</div>
@show

<footer>
    Copyright 2021 NIIT
</footer>
</body>
</html>
