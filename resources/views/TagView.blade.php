@extends('Layout.HTML_Layout')

@section('content')
    <h1>Tags Related to "{{$tagString}}"</h1>

    @if($tagList->isEmpty())
        <h2>No Article Found with that tag Name</h2>
    @else
        @foreach($tagList as $tagRow)
            <div>
                <a href="{{url('/ArticleView/'.$tagRow->ArticleID)}}"><h2>{{$tagRow->ArticleHeading}}</h2></a>
                <p>{{$tagRow->ArticlePara1}}</p>
            </div>
        @endforeach
    @endif

    <form action="{{url('/')}}" style="display: inline">
        <button type="submit">Home</button>
    </form>
    <form action="{{url('/Search')}}" style="display: inline">
        <button type="submit">Search</button>
    </form>
@endsection
