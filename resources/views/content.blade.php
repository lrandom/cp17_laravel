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

@include('commons.nav',['id'=>10])

{{$content}}

{{$content2}}

@if(true)
    <div>{{10+10}}</div>
@endif

<?php
if (true) {
    echo '<div>'.(10 + 10).'</div>';
  }
?>

<?php
$number = 20;
?>

@if($number==10)
    <div>True</div>
@else
    <div>false</div>
@endif

@if($number==10)
    <div>10</div>
@elseif($number==20)
    <div>20</div>
@elseif($number==30)
    <div>30</div>
@endif


@php
   $choose = 1;
@endphp

@switch($choose)
    @case(1)
       <div>Bạn đã lựa chọn 1</div>
    @break

    @case(2)
       <div>Bạn đã lựa chọn 2</div>
    @break

    @case(3)
       <div>Bạn đã lựa chọn 3</div>
    @break

    @default
       <div>Bạn ko lựa chọn cái gì</div>
@endswitch


@for($i=0;$i<10;$i++)
   <div>{{$i}}</div>
@endfor

<?php $index=0 ?>
@while($index<10)
    {{$index}}
    <?php $index++ ?>
@endwhile

<?php
  $a = [1,3,4,5,6];
?>
@foreach($a as $item)
     {{$item}}
@endforeach


</body>
</html>
