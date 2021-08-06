@extends('Layout.HTML_Layout')

@section('content')
    @if(isset($Messg))
        <h1>{{$Messg}}</h1>
    @endif
    <h1>Search</h1>
    <form method="post" action="{{url('/Search')}}">
        @csrf
        <input type="search" placeholder="Search by Article ID" name="SearchID">
        <button type="submit">Search</button>
    </form><br>
    <form method="post" action="{{url('/Search')}}">
        @csrf
        <input type="search" placeholder="Search by Category" name="SearchCategory">
        <button type="submit">Search</button>
    </form><br>
    <form method="post" action="{{url('/Search')}}">
        @csrf
        <input type="search" placeholder="Search by Tag" name="SearchTag">
        <button type="submit">Search</button>
    </form>
@endsection
