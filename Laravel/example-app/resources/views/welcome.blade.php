@includeFirst(['layouts.navbar','layouts.about'])
<h1>{{$title}}</h1>
<a href="{{route('about','name')}}">About</a>
{{"This is test output"}}

{!!"<h1>This is H1</h1>"!!}
{{-- @@if() --}}
@php
    // $number = 2;
    // $fruits = [['name'=>'1',2,3],[5,6,7]];
    $users =[
        (object)['name'=>'user1','type'=>0,'number'=>1],
        (object)['name'=>'user2','type'=>1,'number'=>2],
        (object)['name'=>'user3','type'=>2,'number'=>3],
        (object)['name'=>'user4','type'=>3,'number'=>4]



    ]

@endphp

@forelse($users as $user)
    {{-- {{$loop->iteration}} - {{$fruit}} <br> --}}
    {{-- @if ($loop->even)
        <li style="color: red">{{$fruit}}</li>
    @else
        <li style="color: green">{{$fruit}}</li>
    @endif --}}
    <li>{{$user->name}}</li>

@empty
    No Item found
@endforelse


{{--
@foreach ($fruits as $fruit)
  <li>{{$fruit}}</li>

@endforeach --}}


















{{-- @if ($number>5)
    This is if statement
@elseif($number<5)
    This is less than 5 <br>
@endif
@auth
    This is auth
@endauth
@unless(Auth::check())
    You are not singed in
@endunless --}}
