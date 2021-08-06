@extends('Layout.HTML_Layout')

@section('content')
    <h1>Home</h1>
    @foreach($articles as $article)
        <div>
            <a href="{{url('/ArticleView/'.$article->ArticleID)}}"><h2>{{$article->ArticleHeading}}</h2></a>
            <p>{{$article->ArticlePara1}}</p>
        </div>
    @endforeach
@endsection
