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
<form action="{{route('do-contact')}}" method="post">

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
        <br>
    @csrf
    <input type="text" name="fullName" placeholder="full name"/>
    {{$errors->first('fullName')}}
        @error('fullName')
            {{$message}}
        @enderror

    <br>
    <input type="text" name="address" placeholder="address"/>
    {{$errors->first('address')}}

    <br>
    <input type="phone" name="phone" placeholder="phone"/>
    {{$errors->first('phone')}}

    <br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
    {{$errors->first('message')}}

        <br>
    <button>Submit</button>
</form>
</body>
</html>
