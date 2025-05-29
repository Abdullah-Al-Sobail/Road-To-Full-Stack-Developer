<h1>{{$title}}</h1>
<a href="{{route('about','name')}}">About</a>
{{"This is test output"}}

{!!"<h1>This is H1</h1>"!!}
{{-- @@if() --}}
@php
    $number = 2;
@endphp
@if ($number>5)
    This is if statement
@elseif($number<5)
    This is less than 5 <br>
@endif
@auth
    This is auth
@endauth
@unless(Auth::check())
    You are not singed in
@endunless
