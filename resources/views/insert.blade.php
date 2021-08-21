<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{route('do-insert')}}" method="post">
       @csrf
       <input type="text" name="name" placeholder="name">
       <input type="text" name="price" placeholder="price">
       <input type="text" name="content" placeholder="content">
       <input type="text" name="category_id" placeholder="Category">
       <input type="text" name="keyword" placeholder="Keyword">
       <button>Submit</button>
   </form>
</body>
</html>
